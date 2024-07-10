<?php

namespace App\Http\Controllers;

use App\Events\testingEvent;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function selectOption(Request $request)
    {
        // dd($request->all());
        $message = $request->input('message');
        broadcast(new testingEvent($message));
        return response()->json(['status' => 'Option selected']);
    }
}
