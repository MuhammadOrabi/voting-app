@extends('layouts.app')

@section('content')
	<h4>{{ $poll->poll }}</h4>
	@if(Auth::guest())
		<chart id="{{ $poll->id }}" type="guest"></chart>
	@else
		@if(Auth::user()->id == $poll->user_id)
			<chart id="{{ $poll->id }}" type="owner"></chart>
		@else
			<chart id="{{ $poll->id }}" type="guest"></chart>
		@endif
	@endif
@stop