<?php

namespace Battleroad\Account\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json($request->user());
    }
}
