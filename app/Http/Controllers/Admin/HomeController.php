<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    function view(){
        return view('dashboard');
    }   
}
