@extends('layouts.app')

@section('title', $user->name.'\'s wishlist')

@section('content')

	<div id="communitySection">
		<h1>{{ $user->name }}'s wishlist</h1>
		<div class="community-actions-wrapper">
			<div class="community-action">
				<a href="{{ route('users.profile', ['id'=> $user->id]) }}">All Games</a>
			</div>
			<div class="community-action active-action">
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
						<a href="{{ route('games.show', ['id'=> $game->game]) }}">
							<div class="game-wish-order">
								{{ $loop->iteration }}
							</div>
							<div class="game-image-wrapper">
								<img src="{{ $game->image }}">
							</div>
							<div class="game-content-wrapper">
								<div class="game-content-first-col">
									<h4>{{ $game->title }}</h4>
									<h6>Added on {{ Carbon\Carbon::parse($game->created)->format('d M Y') }}</h6>
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
			@else

				<h3>{{ $games->message }}</h3>

			@endif

		</div>
	</div>

@endsection