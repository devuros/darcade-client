@extends('layouts.app')

@section('title', 'Darcade Support')

@section('content')

	<div id="supportSection">
		<div class="support-top">
			<h1>Have a Question?</h1>
			<p>Write your question or concern, and we'll reply within 48 hours.</p>
		</div>
		<form method='POST' action='/contact'>
			<div class="form-group">
				<input class="form-control" type="text" id="name" name="name" placeholder="What's your name?" required="required">
			</div>
			<div class="form-group">
				<input class="form-control" type="email" id="email" name="email" placeholder="Which email should we respond to?" required="required">
			</div>
			<div class="form-group">
				<textarea class="form-control" id="question" rows="5" placeholder="Okey, what's your question?" required="required"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" id="verification" name="verification" placeholder="What is 1 + 4?" required="required">
			</div>
			<div class="submit-button-wrapper">
				<button type="submit" class="btn btn-primary">SEND</button>
				<div class="clear"></div>
			</div>
		</form>
	</div>

@endsection