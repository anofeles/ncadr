<?php


namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        return view('front.page.home');
    }

    public function new(){

        return view('front.page.new');
    }

    public function them(){

        return view('front.page.them');
    }

    public function kodex(){

        return view('front.page.kodex');
    }

    public function fullthem(){

        return view('front.page.full_them');
    }
}
