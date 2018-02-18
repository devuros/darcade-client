<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends ClientController
{

	public function __construct()
	{
		//
	}

	public function index()
	{

		return view('cart.index');

	}

	public function remove($id)
	{

		//

	}

	public function empty()
	{

		//

	}

	public function checkout()
	{
		//
	}

	public function history()
	{
		//
	}

}
