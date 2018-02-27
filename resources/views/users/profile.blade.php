@extends('layouts.app')

@section('title', 'Community :: '.$user->name)

@section('content')
	<div id="communitySection">
		<h1>Community :: {{ $user->name }}</h1>
		<div class="community-actions-wrapper">
			<div class="community-action active-action">
				<a href="{{ route('users.profile', ['id'=> $user->id]) }}">All Games</a>
			</div>
			<div class="community-action">
				<a href="{{ route('users.wishes', ['id'=> $user->id]) }}">Wishlist</a>
			</div>
			<div class="community-action">
				<a href="{{ route('users.reviews', ['id'=> $user->id]) }}">Reviews</a>
			</div>
		</div>
		<div class="community-baseline"></div>
		<div class="genre-games-wrapper">
			@if(!isset($games->message))
				@foreach($games as $game)
					<div class="game-wrapper">
						<a href="{{ route('games.show', ['id'=> $game->id]) }}">
							<div class="game-image-wrapper">
								<img src="{{ $game->image }}">
							</div>
							<div class="game-content-wrapper">
								<div class="game-content-first-col">
									<h4>{{ $game->title }}</h4>
								</div>
								<div class="clear"></div>
							</div>
						</a>
					</div>
				@endforeach
			@else
				<h3>{{ $games->message }}</h3>
			@endif
		</div>
	</div>
@endsection