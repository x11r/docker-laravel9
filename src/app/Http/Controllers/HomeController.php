<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Holiday;

class HomeController extends Controller
{
    public function __construct()
    {
		//
    }

	public function index()
	{
		$holidays = Holiday::orderBy('date')->get();

		$params = [
			'holidays' => $holidays,
		];

		return view('home.index', $params);
	}
}
