<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function home()
    {

        return view('home');
    }
}
