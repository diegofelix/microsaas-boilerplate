<?php

namespace Battleroad\Account\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // regenerate session to prevent session fixation
            $request->session()->regenerate();

            return response()->noContent();
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
