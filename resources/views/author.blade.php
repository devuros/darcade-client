@extends('layouts.app')

@section('title', 'About me')

@section('content')
	<div id="authorSection">
		<h1>About me</h1>
		<div id="authorWrapper">
			<div id="authorLeft">
				<img src="{{ asset('images/author.png') }}">
			</div>
			<div id="authorRight">
				<p>My name is Uroš Jovanović 11/13, student of ICT college in Belgrade.</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
@endsection