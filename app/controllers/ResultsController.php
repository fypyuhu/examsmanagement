<?php

class ResultsController extends \BaseController {

	/**
	 * Display a listing of results
	 *
	 * @return Response
	 */
	public function index()
	{
		$results = Result::all();

		return View::make('results.index', compact('results'));
	}

	/**
	 * Show the form for creating a new result
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('results.create');
	}

	/**
	 * Store a newly created result in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Result::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Result::create($data);

		return Redirect::route('results.index');
	}

	/**
	 * Display the specified result.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$result = Result::findOrFail($id);

		return View::make('results.show', compact('result'));
	}

	/**
	 * Show the form for editing the specified result.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$result = Result::find($id);

		return View::make('results.edit', compact('result'));
	}

	/**
	 * Update the specified result in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$result = Result::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Result::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$result->update($data);

		return Redirect::route('results.index');
	}

	/**
	 * Remove the specified result from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Result::destroy($id);

		return Redirect::route('results.index');
	}

}
