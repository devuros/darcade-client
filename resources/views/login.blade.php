@extends('layouts.app')

@section('title', 'Login to Darcade')

@section('content')

	<div id='loginSectionWrapper'>
		<h2>Login to Darcade</h2>
		<form method='POST' action='/login'>

			<div class="form-group">
				<label class=''>Email</label>
				<input class="form-control" type='text' class='' name='email' required="required">
			</div>
			<div class="form-group">
				<label class=''>Password</label>
				<input class="form-control" type='password' class='' name='password' required="required">
			</div>
			<div class="submit-button-wrapper">
				<button type='submit' class='btn btn-primary'>login</button>
				<div class="clear"></div>
			</div>

		</form>

	</div>

@endsection