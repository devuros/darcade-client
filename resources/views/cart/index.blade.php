@extends('layouts.app')

@section('title', 'Your shopping cart')

@section('content')

	<div id="cartSection">

		<div id='cartSectionLeft'>
			<h2>Your Shopping cart</h2>
			<div id="cartContentWrapper">

				<div class="game-wrapper">
					<div class="game-image-wrapper">
						<img src="{{ asset('images/first.svg') }}">
					</div>
					<div class="game-content-wrapper">
						<div class="game-content-first-col">
							<h4>Kingdom Come: Deliverance</h4>
						</div>

						<div class="game-content-second-col">
							<div>-17%</div>
						</div>
						<div class="game-content-third-col">
							<div class="special-offer-price-both">
								<div class="special-offer-price-base">
									<del>66.3&euro;</del>
								</div>
								<div class="special-offer-price-sale">54.76&euro;</div>
							</div>
						</div>
						<div class="game-content-forth-col">
							<a href="{{ route('cart.remove', ['id' => 1]) }}">Remove</a>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="game-wrapper">
					<div class="game-image-wrapper">
						<img src="{{ asset('images/second.svg') }}">
					</div>
					<div class="game-content-wrapper">
						<div class="game-content-first-col">
							<h4>Men of War 2</h4>
						</div>

						<div class="game-content-second-col">
							<div>-25%</div>
						</div>
						<div class="game-content-third-col">
							<div class="special-offer-price-both">
								<div class="special-offer-price-base">
									<del>9.99&euro;</del>
								</div>
								<div class="special-offer-price-sale">7.49&euro;</div>
							</div>
						</div>
						<div class="game-content-forth-col">
							<a href="{{ route('cart.remove', ['id' => 1]) }}">Remove</a>
						</div>

						<div class="clear"></div>
					</div>
				</div>

			</div>
			<div class="cart-buy-wrapper">
				<div class="cart-buy-top">
					<div class="top-left">Total price:</div>
					<div class="top-right">62.25&euro;</div>
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
		</div>
		<div id='cartSectionRight'>
			<a href="{{ route('cart.history') }}" title="View complete purchase history">Purchase history</a>
		</div>
	</div>

@endsection