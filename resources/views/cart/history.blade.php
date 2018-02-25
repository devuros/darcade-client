@extends('layouts.app')

@section('title', 'Your purchase history')

@section('content')

	<div id="cartSection">
		<div id='cartSectionLeft'>
			<h2>Your Purchase History</h2>

			@if(!isset($purchase_history->message))

				<div id="purchaseHistoryContentWrapper">
					<div id='purchaseHeader'>
						<div class="purchase-row">
							<div class="col-1">Date</div>
							<div class="col-2">Items</div>
							<div class="col-3">Total</div>
						</div>
					</div>
					<div id='purchaseBody'>

						@foreach($purchase_history as $purchase)

							<div class="purchase-row">
								<div class="col-1">
									{{ Carbon\Carbon::parse($purchase->date)->format('d M Y') }}
								</div>
								<div class="col-2">
									<a href="{{ route('games.show', ['id'=> $purchase->game_id]) }}">{{ $purchase->item }}</a>
								</div>
								<div class="col-3"> {{ $purchase->total }}&euro;</div>
							</div>

						@endforeach

					</div>
				</div>

			@else

				<h4>{{ $purchase_history->message }}</h4>

			@endif

		</div>
		<div id='cartSectionRight'>
			<a href="{{ route('cart.history') }}" title="View complete purchase history">Purchase history</a>
		</div>
	</div>

@endsection