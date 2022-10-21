<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\api_Key;
use Illuminate\Http\Request;

class apiKey extends Controller
{
    public function get($name)
    {
        $api_Key = new api_Key();
        $User = new User();
        $tokenobj = $User->createToken($name)->accessToken;
        $api_Key->key = $tokenobj;
        $api_Key->name = $name;
        $api_Key ->save();
        return response()->json($api_Key);
    }
}
