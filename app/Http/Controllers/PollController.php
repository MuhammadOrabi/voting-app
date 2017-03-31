<?php

namespace App\Http\Controllers;

use App\User;
use App\option;
use App\poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$poll = poll::find($request->id);
		return view('poll', compact('poll'));
	}

	public function getData(Request $request)
	{
		$poll = poll::find($request->id);
		$labels = array();
		$votes = array();
		foreach ($poll->options as $option) {
			array_push($labels, $option->option);
			array_push($votes, $option->votes);
		}
		return response()->json(['labels' => $labels, 'votes' => $votes]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
				'poll'   => 'required|unique:polls',
				'option' => 'required',
				'id'     => 'required|exists:users'
			]);
		$p          = new poll();
		$p->user_id = $request->id;
		$p->poll    = $request->poll;
		$p->save();
		foreach ($request->options as $option) {
			$op          = new option();
			$op->option  = $option;
			$op->poll_id = $p->id;
			$op->save();
		}
		return response()->json(['msg' => 'Success']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\poll  $poll
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request) {
		$user  = User::find($request->id);
		$polls = $user->polls;
		foreach ($user->polls as $poll) {
			$polls->merge($poll->options);
		}
		return response()->json(['polls' => $polls, 'works']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\poll  $poll
	 * @return \Illuminate\Http\Response
	 */
	public function edit(poll $poll) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\poll  $poll
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {
		$op = DB::table('options')->where('poll_id', $request->id)->where('option', $request->option)->increment('votes');
		return response()->json('Done');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\poll  $poll
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request) {
		$poll = poll::find($request->id);
		foreach ($poll->options as $option) {
			$option->delete();
		}
		$poll->delete();
		return response()->json('Done!');
	}
}
