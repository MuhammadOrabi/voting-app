<?php

namespace App\Http\Controllers;

use App\option;
use Illuminate\Http\Request;

class OptionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('options');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\option  $option
	 * @return \Illuminate\Http\Response
	 */
	public function show(option $option) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\option  $option
	 * @return \Illuminate\Http\Response
	 */
	public function edit(option $option) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\option  $option
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, option $option) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\option  $option
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(option $option) {
		//
	}
}
