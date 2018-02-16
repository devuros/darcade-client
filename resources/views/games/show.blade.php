@extends('layouts.app')

@section('title', $game->title)

@section('content')

	<div id="gameShow">

		<h2>{{ $game->title }}</h2>

		<div class='game-info-wrapper'>
			<div class='game-info-left'>
				<div class='game-left-top'>
					<img src="{{ asset('images/first.svg') }}">
				</div>
				<div class='game-left-bottom'>
					<img src="{{ asset('images/first.svg') }}">
					<img src="{{ asset('images/second.svg') }}">
					<img src="{{ asset('images/third.svg') }}">
					<img src="{{ asset('images/first.svg') }}">
				</div>
			</div>
			<div class='game-info-right'>
				<div class='game-right-image'>
					<img src="{{ asset('images/third.svg') }}">
				</div>
				<div class='game-right-desc'>
					<p>{{ $game->description }}</p>
				</div>
				<div class='game-right-details'>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase'>all reviews:</span>
						<span class='white'>23% positive</span>
						<span class='gray'>(17 total)</span>
					</div>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase'>release date:</span>
						<span class='white'>{{ $game->release_date }}</span>
					</div>
					<div class="game-details-row">
						<span class='gray uppercase'>developer:</span>
						<span class='white'>
							<a href="{{ route('developers.index', ['id'=> 1]) }}">
								{{ $game->developer }}
							</a>
						</span>
					</div>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase'>publisher:</span>
						<span class='white'>
							<a href="{{ route('publishers.index', ['id'=> 1]) }}">
								{{ $game->publisher }}
							</a>
						</span>
					</div>
					<div class='game-right-genre'>
						<span class='gray uppercase'>genres:</span>
						<span class='white'>

							@foreach($game->genres as $genre)

								<a href="{{ route('genres.showGenreGames', ['id'=> $genre->id]) }}">
									{{ $genre->genre }}
								</a>

							@endforeach

						</span>
					</div>
				</div>
			</div>
		</div>


		<div class="game-action-wrapper">
			@guest
				<p>Sign in to add this item to your wishlist</p>
			@endguest
		</div>

		<div class="game-bottom-section">
			<div class="game-buy-wrapper">
				<h3>Buy {{ $game->title }}</h3>
			</div>
			<div class="game-about-wrapper">

			</div>
			<div class="game-reviews-wrapper">

			</div>
		</div>

	</div>

@endsection