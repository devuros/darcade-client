@extends('layouts.index')

@section('title', 'Welcome to Darcade')

@section('content')
	<div class='container home-page-content-wrapper'>
		<div class='home-page-gutter'>
			<div class='gutter-icon'>
				<a href="{{ route('quantic.time') }}" target="_blank" title="Time is the enemy">
					<i class='fa fa-crosshairs fa-4x'></i>
				</a>
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
						<a class="gutter-item" href="{{ route('genres.showGenreGames', ['id'=> $genre->id]) }}">
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
							@foreach($featured as $fg)
								@if($loop->first)
									<li data-target='#featuredCarousel' data-slide-to="0" class="active"></li>
								@else
									<li data-target='#featuredCarousel' data-slide-to="{{ $loop->index }}"></li>
								@endif
							@endforeach
						</ol>
						<div class='carousel-inner'>
							@foreach($featured as $fg)
								@if($loop->first)
									<div class='carousel-item active'>
								@else
									<div class='carousel-item'>
								@endif
									<a href="{{ route('games.show', ['id'=> $fg->id]) }}">
										<img class='d-block w-100' src="{{ $fg->image }}">
										<div class='featured-info'>
											<div class="info-title">
												<h2>{{ $fg->title }}</h2>
											</div>
											<div class="info-price">
												@if($fg->is_on_sale)
													<div class='price-discount'>
														-{{ round(100*($fg->base_price-$fg->sale_price)/$fg->base_price) }}%
													</div>
													<div class='price-base'>
														<del>{{ $fg->base_price }}&euro;</del>
													</div>
													<div class='price-actual'>{{ $fg->sale_price }}&euro;</div>
												@else
													<div class='price-actual'>{{ $fg->base_price }}&euro;</div>
												@endif
											</div>
										</div>
									</a>
								</div>
							@endforeach
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
						@foreach($specials as $special)
							<div class='special-offer-item'>
								<a href="{{ route('games.show', ['id'=> $special->id]) }}">
									<div class='special-offer-item-image'>
										<img src="{{ $special->image }}">
									</div>
									<div class='special-offer-item-price'>
										<div class='special-offer-item-price-wrapper'>
											<div class='special-offer-price-discount'>
												-{{ round(100*($special->base_price-$special->sale_price)/$special->base_price) }}%
											</div>
											<div class='special-offer-price-both'>
												<div class='special-offer-price-base'>
													<del>{{ $special->base_price }}&euro;</del>
												</div>
												<div class='special-offer-price-sale'>{{ $special->sale_price }}&euro;</div>
											</div>
										</div>
									</div>
								</a>
							</div>
						@endforeach
						<div class="clear"></div>
					</div>
				</div>
			</div>
			{{-- Browse darcade section --}}
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
			{{-- Under 10 section --}}
			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>under 10&euro;
						<span class='browse-all'>
							<a href="{{ route('search.under.10') }}">browse all</a>
						</span>
					</h2>
				</div>
				<div id='under10' class='home-page-section-content'>
					@foreach($under10 as $ut)
						<div class='special-offer-item'>
							<a href="{{ route('games.show', ['id'=> $ut->id]) }}">
								<div class='special-offer-item-image'>
									<img src="{{ $ut->image }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										@if($ut->is_on_sale)
											<div class='special-offer-price-discount'>
												-{{ round(100*($ut->base_price-$ut->sale_price)/$ut->base_price) }}%
											</div>
											<div class='special-offer-price-base'>
												<del>{{ $ut->base_price }}&euro;</del>
											</div>
											<div class='special-offer-price-sale'>{{ $ut->sale_price }}&euro;</div>
										@else
											<div class='special-offer-price-sale'>{{ $ut->base_price }}&euro;</div>
										@endif
									</div>
								</div>
							</a>
						</div>
					@endforeach
					<div class="clear"></div>
				</div>
			</div>
			{{-- Under 25 section --}}
			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>under 25&euro;
						<span class='browse-all'>
							<a href="{{ route('search.under.25') }}">browse all</a>
						</span>
					</h2>
				</div>
				<div id='under25' class='home-page-section-content'>
					@foreach($under25 as $utf)
						<div class='special-offer-item'>
							<a href="{{ route('games.show', ['id'=> $utf->id]) }}">
								<div class='special-offer-item-image'>
									<img src="{{ $utf->image }}">
								</div>
								<div class='special-offer-item-price'>
									<div class='special-offer-item-price-wrapper'>
										@if($utf->is_on_sale)
											<div class='special-offer-price-discount'>
												-{{ round(100*($utf->base_price-$utf->sale_price)/$utf->base_price) }}%
											</div>
											<div class='special-offer-price-base'>
												<del>{{ $utf->base_price }}&euro;</del>
											</div>
											<div class='special-offer-price-sale'>{{ $utf->sale_price }}&euro;</div>
										@else
											<div class='special-offer-price-sale'>{{ $utf->base_price }}&euro;</div>
										@endif
									</div>
								</div>
							</a>
						</div>
					@endforeach
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection