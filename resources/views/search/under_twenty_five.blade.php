@extends('layouts.app')

@section('title', 'Browsing Under 25&euro;')

@section('content')

	<div id="showGenreGamesSection">
		<h1>Browsing Under 25&euro;</h1>
		<div class="genre-games-wrapper">

			@foreach($under25 as $game)

				<div class="game-wrapper">
					<a href="{{ route('games.show', ['id'=> $game->id]) }}">
						<div class="game-image-wrapper">
							<img src="{{ $game->image }}">
						</div>
						<div class="game-content-wrapper">
							<div class="game-content-first-col">
								<h4>{{ $game->title }}</h4>

								@foreach($game->genres as $genre)
									<h6>{{ $genre->genre }}</h6>
								@endforeach

							</div>

							@if($game->is_on_sale)

								<div class="game-content-second-col">
									<div>-{{ round(100*($game->base_price-$game->sale_price)/$game->base_price) }}%</div>
								</div>
								<div class="game-content-third-col">
									<div class="special-offer-price-both">
										<div class="special-offer-price-base">
											<del>{{ $game->base_price }}&euro;</del>
										</div>
										<div class="special-offer-price-sale">{{ $game->sale_price }}&euro;</div>
									</div>
								</div>

							@else

								<div class="game-content-third-col">
									<div class="special-offer-price-both">
										<div class="special-offer-price-sale">{{ $game->base_price }}&euro;</div>
									</div>
								</div>

							@endif

							<div class="clear"></div>
						</div>
					</a>
				</div>

			@endforeach

		</div>
	</div>

@endsection