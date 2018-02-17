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
						<span class='white'>
							{{ Carbon\Carbon::parse($game->release_date)->format('d M Y') }}
						</span>
					</div>
					<div class="game-details-row">
						<span class='gray uppercase'>developer:</span>
						<span class='white'>
							<a href="{{ route('developers.showDeveloperGames', ['id'=> $game->developer->id]) }}">
								{{ $game->developer->developer }}
							</a>
						</span>
					</div>
					<div class="game-details-row margin-bottom-10">
						<span class='gray uppercase'>publisher:</span>
						<span class='white'>
							<a href="{{ route('publishers.showPublisherGames', ['id'=> $game->publisher->id]) }}">
								{{ $game->publisher->publisher }}
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

						@auth
							<a class="link-buttton" href="{{ route('home') }}">Add to Cart</a>
							{{-- <a class="link-buttton" href="{{ route('login') }}">Sign in</a> --}}
						@endauth
						@guest
							{{-- <a class="link-buttton" href="{{ route('home') }}">Add to Cart</a> --}}
							<a class="link-buttton" href="{{ route('login') }}">Sign in</a>
						@endguest

					</div>

				</div>
			</div>
			<div class="game-about-wrapper">
				<h2>about this game</h2>
				<p>{{ $game->about }}</p>
			</div>
			<div class="game-reviews-wrapper">
				<h2>customer reviews</h2>

				<div class="review-wrapper">
					<div class="review-left">
						<h4>Storm</h4>
						<h5>2 reviews</h5>
					</div>
					<div class="review-right">
						<div class="review-right-recommended">
							<div class="review-right-icon rec">
								<i class="fa fa-thumbs-up"></i>
							</div>
							<div class="review-right-title">Recommended</div>
						</div>
						<div class="review-right-time">
							<span class='uppercase'>posted: 15 february</span>
						</div>
						<div class="review-right-content">
							<p>
								Quo voluptatem quae illo aut recusandae est nulla. Quia ut eum laborum. Earum cum quia exercitationem nemo alias eligendi velit. Eligendi possimus mollitia provident aliquam illo sit quaerat eum. Illum ut et in iusto omnis ut.
							</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="review-wrapper">
					<div class="review-left">
						<h4>Vendetta</h4>
						<h5>5 reviews</h5>
					</div>
					<div class="review-right">
						<div class="review-right-recommended">
							<div class="review-right-icon not-rec">
								<i class="fa fa-thumbs-down"></i>
							</div>
							<div class="review-right-title">Not Recommended</div>
						</div>
						<div class="review-right-time">
							<span class='uppercase'>posted: 9 february</span>
						</div>
						<div class="review-right-content">
							<p>
								Illum ut et in iusto omnis ut. Aut fuga veritatis tempore officiis qui voluptas dolor. Aspernatur commodi optio ipsam quae eaque rerum ut. Ipsa commodi officia ducimus est non.
							</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>

			</div>
		</div>

	</div>

@endsection