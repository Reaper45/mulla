<?php

namespace App\Http\Controllers;

use App\EncryptParameters;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
{
    private $accessKey = '$2a$08$40QhITVE/4NHIxthQc4dEu4oPgUm/YZmhCPp2KguOJB53iYiRp3L2';
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
