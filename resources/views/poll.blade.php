@extends('layouts.app')

@section('content')
	<h4>{{ $poll->poll }}</h4>
	<chart id="{{ $poll->id }}"></chart>
@stop