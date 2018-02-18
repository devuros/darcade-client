@extends('layouts.app')

@section('title', 'Login to Darcade')

@section('content')

	<div id=''>

		<form method='POST' action='/login'>

			<input type='text' class='' name='email' placeholder="email">
			<br/><br/>
			<input type='password' class='' name='password'>
			<br/><br/>

			<button type='submit' class=''>login</button>

		</form>

	</div>

@endsection