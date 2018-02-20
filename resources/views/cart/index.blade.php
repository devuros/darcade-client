@extends('layouts.app')

@section('title', 'Your shopping cart')

@section('content')

	<div id="cartSection">

		<div id='cartSectionLeft'>
			<h2>Your Shopping cart</h2>

			@if (session('success'))
    			<div class="alert alert-success">
        			{{ session('success') }}
    			</div>
			@endif

			@if(!isset($cart_content->message))

				<div id="cartContentWrapper">
					@php
						$total = 0;
					@endphp

					@foreach($cart_content as $game)

						<div class="game-wrapper">
							<div class="game-image-wrapper">
								<a href="{{ route('games.show', ['id'=> $game->id]) }}">
									<img src="{{ asset('images/first.svg') }}">
								</a>
							</div>
							<div class="game-content-wrapper">
								<div class="game-content-first-col">
									<h4>{{ $game->title }}</h4>
								</div>

								@if($game->is_on_sale)

									@php
										$total += $game->sale_price;
									@endphp

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

									@php
										$total += $game->base_price;
									@endphp

									<div class="game-content-second-col">
										<div></div>
									</div>
									<div class="game-content-third-col">
										<div class="special-offer-price-both">
											<div class="special-offer-price-sale">{{ $game->base_price }}&euro;</div>
										</div>
									</div>

								@endif

								<div class="game-content-forth-col">
									<a href="{{ route('cart.remove', ['id' => $game->cart_id]) }}">Remove</a>
								</div>

								<div class="clear"></div>
							</div>
						</div>

					@endforeach

				</div>
				<div class="cart-buy-wrapper">
					<div class="cart-buy-top">
						<div class="top-left">Total price:</div>
						<div class="top-right">
							{{ $total }}&euro;
						</div>
					</div>
					<div class="cart-buy-bottom">
						<div class="bottom-left">
							<a class="link-button" href="{{ route('cart.empty') }}">Empty cart</a>
						</div>
						<div class="bottom-right">
							<a class="link-button" href="{{ route('cart.checkout') }}">Checkout</a>
						</div>
					</div>
				</div>

			@else

				<h4>{{ $cart_content->message }}</h4>

			@endif

		</div>

		<div id='cartSectionRight'>
			<a href="{{ route('cart.history') }}" title="View complete purchase history">Purchase history</a>
		</div>
	</div>

@endsection