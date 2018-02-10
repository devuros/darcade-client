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

			<div class='home-page-section'>
				<div class='home-page-section-title'>
					<h2>featured &amp; recommended</h2>
				</div>
				<div id='featuredSection' class='home-page-section-content'>

					<div id='featuredCarousel' class='carousel slide' data-ride='carousel'>
						<div class='carousel-inner'>
							<div class='carousel-item active'>
								<img class='d-block w-100' src="{{ asset('images/first.svg') }}">
							</div>
							<div class='carousel-item'>
								<img class='d-block w-100' src="{{ asset('images/second.svg') }}">
							</div>
							<div class='carousel-item'>
								<img class='d-block w-100' src="{{ asset('images/third.svg') }}">
							</div>
						</div>
					</div>
					<div id='featuredAside'>

					</div>
					<div class="clear"></div>

				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

@endsection