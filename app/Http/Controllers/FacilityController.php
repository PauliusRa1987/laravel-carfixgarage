<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('facility.index', ['facilities' => $facilities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workShops = WorkShop::all();
        return view('facility.create', ['workShops' => $workShops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacilityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = new Facility;
        $facility->facility_name = $request->facility_name;
        $facility->duration = $request->duration;
        $facility->price = $request->price;
        $facility->shop_id = $request->shop_id;
        $facility->save();
        return redirect()->route('facility-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        $workShops = WorkShop::all();
        return view('facility.edit', ['facility' => $facility, 'workShops' => $workShops]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacilityRequest  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $facility->facility_name = $request->facility_name;
        $facility->duration = $request->duration;
        $facility->price = $request->price;
        $facility->save();
        return redirect()->route('facility-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->back();
    }
}
