@extends('layouts.app')
@section('content')
	<div class="card p-2">
		<h4 class="card-title  text-center">Polls</h4>
		<ul class="list-group list-group-flush">
			@foreach($polls as $poll)
				<li class="list-group-item">
					<a href="/poll/{{ $poll->id }}" class="card-link">{{ $poll->poll }}</a>
				</li>
			@endforeach
		</ul>
	</div>
@stop