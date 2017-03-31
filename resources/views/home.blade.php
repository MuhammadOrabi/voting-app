@extends('layouts.app')

@section('content')
<div class="container p-5" style="background: #E1CAB3;">
	<poll user="{{ auth()->user()->id }}"></poll>
</div>
@endsection
