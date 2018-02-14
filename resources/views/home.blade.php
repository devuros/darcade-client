@extends('layouts.app')

@section('title', 'Welcome to Darcade')

@section('content')

	<div class='container home-page-content-wrapper'>
		<div class='home-page-gutter'>
			<div class='gutter-icon'>

				<i class='fa fa-crosshairs fa-4x'></i>

			</div>
			<div class="gutter-wrapper">
				<div class='gutter-header'>browse categories</div>
				<div class='gutter-items'>

					<a class="gutter-item" href="{{ route('search.top') }}">
						<div>
							<i class='fa fa-line-chart'></i>
						</div>
						<b class="item-text">top sellers</b>
					</a>
					<a class="gutter-item" href="{{ route('search.new') }}">
						<div>
							<i class='fa fa-plus'></i>
						</div>
						<b class="item-text">new releases</b>
					</a>
					<a class="gutter-item" href="{{ route('search.specials') }}">
						<div>
							<i class='fa fa-percent'></i>
						</div>
						<b class="item-text">specials</b>
					</a>

				</div>
				<div class='gutter-header gutter-genres'>browse by genre</div>
				<div class='gutter-items'>

					@foreach($genres as $genre)

					<a class="gutter-item" href="{{ route('genres').'/'.$genre->id }}">
						<b class="item-text">
							{{ $genre->genre }}
						</b>
					</a>

					@endforeach

				</div>
			</div>
		</div>
		<div class='home-page-core-wrapper'>

			{{-- Slider section --}}
			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>featured &amp; recommended</h2>
				</div>
				<div id='featuredSection' class='home-page-section-content'>

					<div id='featuredCarousel' class='carousel slide' data-ride='carousel'>

						<ol class="carousel-indicators">
							<li data-target='#featuredCarousel' data-slide-to="0" class="active"></li>
							<li data-target='#featuredCarousel' data-slide-to="1"></li>
							<li data-target='#featuredCarousel' data-slide-to="2"></li>
						</ol>
						<div class='carousel-inner'>

							<div class='carousel-item active'>
								<a href='#1'>
									<img class='d-block w-100' src="{{ asset('images/first.svg') }}">
									<div class='featured-info'>
										<div class="info-title">
											<h2>Divinity: Original Sin 2</h2>
										</div>
										<div class="info-price">
											<div class='price-actual'>27,99&euro;</div>
										</div>
									</div>
								</a>
							</div>

							<div class='carousel-item'>
								<a href='#2'>
									<img class='d-block w-100' src="{{ asset('images/second.svg') }}">
									<div class='featured-info'>
										<div class="info-title">
											<h2>Human: Fall Flat</h2>
										</div>
										<div class="info-price">
											<div class='price-discount'>-60%</div>
											<div class='price-base'>
												<del>19,99&euro;</del>
											</div>
											<div class='price-actual'>7,99&euro;</div>
										</div>
									</div>
								</a>
							</div>

							<div class='carousel-item'>
								<a href='#3'>
									<img class='d-block w-100' src="{{ asset('images/third.svg') }}">
									<div class='featured-info'>
										<div class="info-title">
											<h2>Grand Theft Auto V</h2>
										</div>
										<div class="info-price">
											<div class='price-discount'>-40%</div>
											<div class='price-base'>
												<del>59,99&euro;</del>
											</div>
											<div class='price-actual'>35,99&euro;</div>
										</div>
									</div>
								</a>
							</div>

						</div>

						<a class='carousel-control carousel-control-prev' href='#featuredCarousel' role='button' data-slide='prev'>
							<span class="carousel-control-prev-icon" aria-hidden="true">
								<i class="fa fa-chevron-left"></i>
							</span>
							<span class="sr-only">Previous</span>
						</a>
						<a class='carousel-control carousel-control-next' href='#featuredCarousel' role='button' data-slide='next'>
							<span class="carousel-control-next-icon" aria-hidden="true">
								<i class="fa fa-chevron-right"></i>
							</span>
							<span class="sr-only">Next</span>
						</a>

					</div>
					<div class="clear"></div>
				</div>
			</div>

			{{-- Special offers section --}}
			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>special offers</h2>
				</div>
				<div id='specialOffers' class='home-page-section-content'>

					<div class='special-offers-row'>
						<div class='special-offer-item'>
							<a href='#1'>
								<div class='special-offer-item-image'>
									<img src="{{ asset('images/first.svg') }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										<div class='special-offer-price-discount'>-75%</div>
										<div class='special-offer-price-both'>
											<div class='special-offer-price-base'>
												<del>39,99&euro;</del>
											</div>
											<div class='special-offer-price-sale'>9,99&euro;</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class='special-offer-item'>
							<a href='#2'>
								<div class='special-offer-item-image'>
									<img src="{{ asset('images/second.svg') }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										<div class='special-offer-price-discount'>-33%</div>
										<div class='special-offer-price-both'>
											<div class='special-offer-price-base'>
												<del>19,99&euro;</del>
											</div>
											<div class='special-offer-price-sale'>13,39&euro;</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class='special-offer-item'>
							<a href='#3'>
								<div class='special-offer-item-image'>
									<img src="{{ asset('images/third.svg') }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										<div class='special-offer-price-discount'>-75%</div>
										<div class='special-offer-price-both'>
											<div class='special-offer-price-base'>
												<del>19,99&euro;</del>
											</div>
											<div class='special-offer-price-sale'>4,99&euro;</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class='special-offers-row'>
						<div class='special-offer-item'>
							<a href='#3'>
								<div class='special-offer-item-image'>
									<img src="{{ asset('images/third.svg') }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										<div class='special-offer-price-discount'>-75%</div>
										<div class='special-offer-price-both'>
											<div class='special-offer-price-base'>
												<del>19,99&euro;</del>
											</div>
											<div class='special-offer-price-sale'>4,99&euro;</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class='special-offer-item'>
							<a href='#2'>
								<div class='special-offer-item-image'>
									<img src="{{ asset('images/second.svg') }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										<div class='special-offer-price-discount'>-33%</div>
										<div class='special-offer-price-both'>
											<div class='special-offer-price-base'>
												<del>19,99&euro;</del>
											</div>
											<div class='special-offer-price-sale'>13,39&euro;</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class='special-offer-item'>
							<a href='#1'>
								<div class='special-offer-item-image'>
									<img src="{{ asset('images/first.svg') }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										<div class='special-offer-price-discount'>-75%</div>
										<div class='special-offer-price-both'>
											<div class='special-offer-price-base'>
												<del>39,99&euro;</del>
											</div>
											<div class='special-offer-price-sale'>9,99&euro;</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="clear"></div>
					</div>

				</div>
			</div>

			{{-- Browse darcade --}}
			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>browse darcade</h2>
				</div>
				<div id='browseDarcade' class='home-page-section-content'>

					<div class="browse-div">
						<a href="{{ route('search.new') }}">new releases</a>
					</div>
					<div class="browse-div">
						<a href="{{ route('search.specials') }}">specials</a>
					</div>
					<div class="browse-div">
						<a href="{{ route('search.top') }}">top sellers</a>
					</div>
					<div class="clear"></div>

				</div>
			</div>

			{{-- Under 25 --}}
			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>under 10&euro;</h2>
				</div>
				<div id='under25' class='home-page-section-content'>

					<div class='special-offer-item'>
						<a href='#1'>
							<div class='special-offer-item-image'>
								<img src="{{ asset('images/first.svg') }}">
							</div>
							<div class='special-offer-item-price'>
								<div class='special-offer-item-price-wrapper'>
									<div class='special-offer-price-discount'>-75%</div>
									<div class='special-offer-price-both'>
										<div class='special-offer-price-base'>
											<del>39,99&euro;</del>
										</div>
										<div class='special-offer-price-sale'>9,99&euro;</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class='special-offer-item'>
						<a href='#2'>
							<div class='special-offer-item-image'>
								<img src="{{ asset('images/second.svg') }}">
							</div>
							<div class='special-offer-item-price'>
								<div class='special-offer-item-price-wrapper'>
									<div class='special-offer-price-discount'>-33%</div>
									<div class='special-offer-price-both'>
										<div class='special-offer-price-base'>
											<del>19,99&euro;</del>
										</div>
										<div class='special-offer-price-sale'>13,39&euro;</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class='special-offer-item'>
						<a href='#3'>
							<div class='special-offer-item-image'>
								<img src="{{ asset('images/third.svg') }}">
							</div>
							<div class='special-offer-item-price'>
								<div class='special-offer-item-price-wrapper'>
									<div class='special-offer-price-discount'>-75%</div>
									<div class='special-offer-price-both'>
										<div class='special-offer-price-base'>
											<del>19,99&euro;</del>
										</div>
										<div class='special-offer-price-sale'>4,99&euro;</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="clear"></div>

				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

@endsection