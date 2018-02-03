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

					<a class="gutter-item" href="#">
						<div>
							<i class='fa fa-line-chart'></i>
						</div>
						<b class="item-text">top sellers</b>
					</a>
					<a class="gutter-item" href="#">
						<div>
							<i class='fa fa-plus'></i>
						</div>
						<b class="item-text">new releases</b>
					</a>
					<a class="gutter-item" href="#">
						<div>
							<i class='fa fa-percent'></i>
						</div>
						<b class="item-text">specials</b>
					</a>

				</div>
				<div class='gutter-header gutter-genres'>browse by genre</div>
				<div class='gutter-items'>

					<a class="gutter-item" href="#">
						<b class="item-text">action</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">adventure</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">indie</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">simulation</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">massively multiplayer</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">strategy</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">RPG</b>
					</a>
					<a class="gutter-item" href="#">
						<b class="item-text">sports</b>
					</a>

				</div>
			</div>
		</div>
		<div class='home-page-core-wrapper'>

			<p>Content</p>

		</div>
	</div>

@endsection