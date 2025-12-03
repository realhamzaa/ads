<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        return view('index');
    }
    function search() {
        return view('search');
    }

    function login() {
        return 'ok';
    }

}
