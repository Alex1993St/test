<?php

namespace App\Http\Controllers;

use App\Action\Lot\CreateLotAction;
use App\Action\Lot\DeleteLotAction;
use App\Action\Lot\UpdateLotAction;
use App\Data\LotData;
use App\Filter\LotFilter;
use App\Http\Requests\LotRequest;
use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lots = LotFilter::filter($request);
        $categories = Category::get();

        return view('lot.index', compact('lots', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('lot.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LotRequest $request, CreateLotAction $action)
    {
        $action(LotData::formRequest($request));

        return redirect(route('lot.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $lot)
    {
        $item = $lot->load('categories');

        return view('lot.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lot $lot)
    {
        $categories = Category::get();

        return view('lot.update', compact('lot', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LotRequest $request, Lot $lot, UpdateLotAction $action)
    {
        $action(LotData::formRequest($request, $lot));

        return redirect(route('lot.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $lot)
    {
        app(DeleteLotAction::class)($lot);

        return redirect(route('lot.index'));
    }
}
