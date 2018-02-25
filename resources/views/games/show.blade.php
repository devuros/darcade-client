@extends('layouts.app')

@section('title', $game->title)

@section('content')

	<div id="gameShow">
		<h2>{{ $game->title }}</h2>
		<div class='game-info-wrapper'>
			<div class='game-info-left'>
				<div class='game-left-top'>
					<img src="{{ $screenshots[0]->source }}">
				</div>
				<div class='game-left-bottom'>

					@foreach($screenshots as $ss)

						<img src="{{ $ss->source }}">

					@endforeach

				</div>
			</div>
			<div class='game-info-right'>
				<div class='game-right-image'>
					<img src="{{ $game->image }}">
				</div>
				<div class='game-right-desc'>
					<p>{{ $game->description }}</p>
				</div>
				<div class='game-right-details'>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase inline-block'>all reviews:</span>
						<span class='white'>
							{{ $statistics->data->stats }}
						</span>
					</div>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase inline-block'>release date:</span>
						<span class='white'>
							{{ Carbon\Carbon::parse($game->release_date)->format('d M Y') }}
						</span>
					</div>
					<div class="game-details-row">
						<span class='gray uppercase inline-block'>developer:</span>
						<span class='white'>
							<a href="{{ route('developers.showDeveloperGames', ['id'=> $game->developer->id]) }}">
								{{ $game->developer->developer }}
							</a>
						</span>
					</div>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase inline-block'>publisher:</span>
						<span class='white'>
							<a href="{{ route('publishers.showPublisherGames', ['id'=> $game->publisher->id]) }}">
								{{ $game->publisher->publisher }}
							</a>
						</span>
					</div>
					<div class='game-right-genre'>
						<span class='gray uppercase inline-block'>genres:</span>
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
			@if (session()->has('user_id'))
				<p>Add to wishlist</p>
			@else
				<p>Sign in to add this item to your wishlist</p>
			@endif
		</div>
		<div class="game-bottom-section">
			<div class="game-buy-wrapper">
				<h3>Buy {{ $game->title }}</h3>
				<div class="game-buy-price-wrapper">

					@if($game->is_on_sale)

						<div class='special-offer-price-discount'>
							-{{ round(100*($game->base_price-$game->sale_price)/$game->base_price) }}%
						</div>
						<div class='special-offer-price-base'>
							<del>{{ $game->base_price }}&euro;</del>
						</div>
						<div class='special-offer-price-sale'>{{ $game->sale_price }}&euro;</div>

					@else

						<div class='special-offer-price-sale'>{{ $game->base_price }}&euro;</div>

					@endif

					<div class='add-to-cart'>

						@if (session()->has('user_id'))
							<a class="link-buttton" href="{{ route('cart.store', ['id'=> $game->id]) }}">Add to Cart</a>
						@else
							<a class="link-buttton" href="{{ route('login') }}">Sign in</a>
						@endif

					</div>
				</div>
			</div>
			<div class="game-about-wrapper">
				<h2>about this game</h2>
				<p>{{ $game->about }}</p>
			</div>
			<div class="game-reviews-wrapper">
				<h2>Customer reviews</h2>

				@if(!isset($reviews->message))
					@foreach($reviews as $review)

						<div class="review-wrapper">
							<div class="review-left">
								<h4>
									<a href="{{ route('users.profile', ['id'=> $review->user_id]) }}">{{ $review->name }}</a>
								</h4>
							</div>
							<div class="review-right">
								<div class="review-right-recommended">

									@if($review->recommended)
										<div class="review-right-icon rec">
											<i class="fa fa-thumbs-up"></i>
										</div>
										<div class="review-right-title">Recommended</div>
									@else
										<div class="review-right-icon not-rec">
											<i class="fa fa-thumbs-down"></i>
										</div>
										<div class="review-right-title">Not Recommended</div>
									@endif

								</div>
								<div class="review-right-time">
									<span class="uppercase">
										posted: {{ Carbon\Carbon::parse($review->created)->format('d M Y') }}
									</span>
								</div>
								<div class="review-right-content">
									<p>
										{{ $review->body }}
									</p>
								</div>
							</div>
							<div class="clear"></div>
						</div>

					@endforeach
				@else

					<h3>{{ $reviews->message }}</h3>

				@endif

			</div>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

@endsection