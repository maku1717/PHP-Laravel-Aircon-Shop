<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function handle($request, Closure $next)
{
    if (!auth()->check() || auth()->user()->is_admin != 1) {
        return redirect('/')->with('error', 'Unauthorized access!');
    }

    return $next($request);
}
}
