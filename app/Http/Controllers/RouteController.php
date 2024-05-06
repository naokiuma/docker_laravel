<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
	public function index(int $id = 999)
	{
		return 'id値:' . $id;
	}
}
