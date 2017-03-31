<?php

namespace App\Http\Controllers;

use App\poll;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth')->except(['show']);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}
	public function show()
	{
		$polls = poll::latest()->get();
		return view('welcome', compact('polls'));
	}
}
