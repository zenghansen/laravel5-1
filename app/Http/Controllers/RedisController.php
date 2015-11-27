<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redis;

class RedisController extends Controller
{

    public function index()
    {
        Redis::set("user:profile:1",111);
        $user = Redis::get('user:profile:1');
        echo $user;
    }

}
