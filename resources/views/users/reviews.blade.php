@extends('layouts.app')

@section('title', $user->name.'\'s reviews')

@section('content')
	<div id="communitySection">
		<h1>{{ $user->name }}'s reviews</h1>
		<div class="community-actions-wrapper">
			<div class="community-action">
				<a href="{{ route('users.profile', ['id'=> $user->id]) }}">All Games</a>
			</div>
			<div class="community-action">
				<a href="{{ route('users.wishes', ['id'=> $user->id]) }}">Wishlist</a>
			</div>
			<div class="community-action active-action">
				<a href="{{ route('users.reviews', ['id'=> $user->id]) }}">Reviews</a>
			</div>
		</div>
		<div class="community-baseline"></div>
		<div class="community-reviews-wrapper">
			<div class="game-reviews-wrapper">
				<h2>Reviews by {{ $user->name }}</h2>
				@if(!isset($reviews->message))
					@foreach($reviews as $review)
						<div class="review-wrapper">
							<div class="review-left">
								<a href="{{ route('games.show', ['id'=> $review->game_id]) }}">
									<img src="{{ $review->image }}">
								</a>
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
									<p>{{ $review->body }}</p>
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
	<div class="communitySectionRight">
		<div class="review_stat">
			<div class="giant_number">
				@if(!isset($reviews->message))
					{{ count($reviews) }}
				@else
					0
				@endif
			</div>
			<div class="giant_desc">reviewed products</div>
		</div>
		<div class="review_stat">
			<div class="giant_number">
				@if(!isset($library->message))
					{{ count($library) }}
				@else
					0
				@endif
			</div>
			<div class="giant_desc">purchased products</div>
		</div>
	</div>
@endsection