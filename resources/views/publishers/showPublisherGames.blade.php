@extends('layouts.app')

@if(isset($games->publisher))

	@section('title', 'Publisher - '.$games->publisher)

@else

	@section('title', 'Publisher - '.$games[0]->publisher->publisher)

@endif

@section('content')

	<div id="showDeveloperGamesSection">

		@if(!isset($games->publisher))

			<h1>Publisher {{ $games[0]->publisher->publisher }}</h1>
			<div class="genre-games-wrapper">

				@foreach($games as $game)

					<div class="game-wrapper">
						<a href="{{ route('games.show', ['id'=> $game->id]) }}">
							<div class="game-image-wrapper">
								<img src="{{ asset('images/first.svg') }}">
							</div>
							<div class="game-content-wrapper">
								<div class="game-content-first-col">
									<h4>{{ $game->title }}</h4>

									@foreach($game->genres as $genre)
										<h6>{{ $genre->genre }}</h6>
									@endforeach

								</div>
								<div class="game-content-forth-col">
									{{ Carbon\Carbon::parse($game->release_date)->format('d M Y') }}
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

		@else

			<h1>Publisher {{ $games->publisher }}</h1>
			<div class="genre-games-wrapper">
				<h3>There are no games</h3>
			</div>

		@endif

	</div>

@endsection