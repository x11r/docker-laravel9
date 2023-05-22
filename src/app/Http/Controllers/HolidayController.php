<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\holiday\StoreRequest;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HolidayController extends Controller
{
	protected Request $request;

	protected string $sessionKey;

	public function __construct(
		Request $request
	) {
		$this->request = $request;
		$this->sessionKey = __CLASS__;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$date = $this->request->input('request') ?? date('Y-m-d');

		$sessions = [
			'date' => $date
		];

		$this->request->session()->put($this->sessionKey, $sessions);

		$holidays = Holiday::query()->orderByDesc('date')->get();

		$params = [
			'sessionKey' => $this->sessionKey,
			'holidays' => $holidays,
		];

        return view('holiday.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

		$sessions = [
			'date' => $request->input('date'),
			'name' => $request->input('name'),
			'comment' => $request->input('comment'),
		];

		$this->request->session()->put($this->sessionKey, $sessions);

	    Holiday::updateOrCreate(
			[
				'date' => $request->input('date')
			],
		    [
				'name' => $request->input('name'),
			    'comment' => $request->input('comment'),
		    ]
	    );

		return redirect()->route('holidays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
