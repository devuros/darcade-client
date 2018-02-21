<div class='header-logo'>
	<a href="{{ route('home') }}">
		<i class='fa fa-fighter-jet fa-5x'></i>
	</a>
</div>
<div class='header-title'>
	<a href="{{ route('home') }}">darcade</a>
</div>
<div class='header-menu'>
	<ul class="nav">
		<li class="nav-item">
			<a href="{{ route('home') }}">store</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('support') }}">support</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('author') }}">author</a>
		</li>
	</ul>
</div>
<div class='header-actions'>
	<ul class="nav">

		@if (session()->has('user_id'))

			<li class="nav-item">
    			<a href="{{ route('cart.index') }}">cart</a>
			</li>
			<li class="nav-item">
				<a href="#">
					{{ session('user_name') }}
				</a>
			</li>
			<li class="nav-item">
    			<a href="{{ route('logout') }}">logout</a>
			</li>

		@else

			<li class="nav-item">
    			<a href="{{ route('login') }}">login</a>
			</li>

		@endif

	</ul>
</div>
