<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
class HomeController extends Controller
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
        $clubs = Club::all();
        return view('club.index', compact( 'clubs'));
    }
}
