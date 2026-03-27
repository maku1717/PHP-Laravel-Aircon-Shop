<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function home()
{
    $featuredProducts = Product::inRandomOrder()->take(4)->get();

    return view('pages.banner', compact('featuredProducts'));
}


    public function index()
    {
        // Fetch all products and group by category
        $categories = Product::orderBy('category')->get()->groupBy('category');

        return view('pages.products', compact('categories'));
    }

    public function show($id)
{
    $product = Product::findOrFail($id);

    $relatedProducts = Product::where('category', $product->category)
        ->where('id', '!=', $id)
        ->limit(4)
        ->get();

    return view('pages.viewProduct', compact('product', 'relatedProducts'));
}

public function cart()
{
    $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    $subtotal = $cartItems->sum(function($item) {
        return $item->product->price * $item->quantity;
    });

    return view('pages.addToCart', compact('cartItems', 'subtotal'));
}

public function addToCart($id)
{
    $product = Product::findOrFail($id);

    $userId = Auth::id();

    $cartItem = Cart::where('user_id', $userId)
        ->where('product_id', $id)
        ->first();

    if ($cartItem) {
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        Cart::create([
            'user_id' => $userId,
            'product_id' => $id,
            'quantity' => 1
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Product added to cart!');
}

public function remove($id)
{
    Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->delete();

    return back()->with('success', 'Item removed!');
}

public function increase($id)
{
    $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

    if ($cart) {
        $cart->quantity += 1;
        $cart->save();
    }

    return back();
}

public function decrease($id)
{
    $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

    if ($cart) {
        $cart->quantity -= 1;

        // remove if quantity is 0
        if ($cart->quantity <= 0) {
            $cart->delete();
        } else {
            $cart->save();
        }
    }

    return back();
}





////////////////// Payment method paymongo //////////////////
public function paymongoCheckout()
{
    $cartItems = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Cart is empty!');
    }

    $lineItems = [];
    $totalAmount = 0;

    foreach ($cartItems as $item) {
        $amount = $item->product->price * 100; // cents

        $lineItems[] = [
            "currency" => "PHP",
            "amount" => $amount,
            "name" => $item->product->name,
            "quantity" => $item->quantity,
        ];

        $totalAmount += $item->product->price * $item->quantity;
    }

    // ✅ SAVE ORDER FIRST
    $order = Order::create([
        'user_id' => auth()->id(),
        'total' => $totalAmount,
        'status' => 'pending'
    ]);

    // ✅ SAVE ORDER ITEMS
    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product->id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);
    }

    // ✅ PAYMONGO REQUEST
    $response = Http::withBasicAuth(env('PAYMONGO_SECRET_KEY'), '')
        ->post('https://api.paymongo.com/v1/checkout_sessions', [
            "data" => [
                "attributes" => [
                    "line_items" => $lineItems,

                    // ⚠️ TEMP: allow card while gcash not active
                    "payment_method_types" => ["gcash", "card"],

                    "success_url" => route('payment.success', ['order_id' => $order->id]),
                    "cancel_url" => route('payment.cancel', ['order_id' => $order->id]),
                ]
            ]
        ]);

    // ✅ SAFE CHECK
    if (!$response->successful()) {
        return back()->with('error', 'Payment failed. Try again.');
    }

    $checkoutUrl = $response['data']['attributes']['checkout_url'];

    return redirect($checkoutUrl);
}


//payment cancell and  payment success
public function paymentSuccess(Request $request)
{
    $order = Order::find($request->order_id);

    if ($order) {
        $order->status = 'paid';
        $order->save();

        // ✅ CLEAR CART
        Cart::where('user_id', auth()->id())->delete();
    }

    return redirect()->route('cart.index')->with('success', 'Payment successful!');
}

public function paymentCancel(Request $request)
{
    $order = Order::find($request->order_id);

    if ($order) {
        $order->status = 'cancelled';
        $order->save();
    }

    return redirect()->route('cart.index')->with('error', 'Payment cancelled.');
}

public function orders()
{
    $orders = Order::with('user', 'items.product')->latest()->get();

    return view('admin.orders', compact('orders'));
}


}
