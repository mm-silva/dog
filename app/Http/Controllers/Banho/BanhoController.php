<?php

namespace App\Http\Controllers\Banho;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanhoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("admin.banho.banho-tosa");
    }
}
