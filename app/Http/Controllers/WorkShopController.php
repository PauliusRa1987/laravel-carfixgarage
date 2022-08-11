<?php

namespace App\Http\Controllers;

use App\Models\WorkShop;
use Illuminate\Http\Request;

class WorkShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workShops = WorkShop::all();
        return view('garage.index', ['workShops' => $workShops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('garage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workShop = new WorkShop;
        $workShop->address = $request->address;
        $workShop->city = $request->city;
        $workShop->zip = $request->zip;
        $workShop->name = $request->name;
        $workShop->phone = $request->phone;
        $workShop->save();
        return redirect()->route('garage-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkShop  $workShop
     * @return \Illuminate\Http\Response
     */
    public function show(WorkShop $workShop)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkShop  $workShop
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkShop $workShop)
    {

        return view('garage.edit', ['workShop' => $workShop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkShopRequest  $request
     * @param  \App\Models\WorkShop  $workShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkShop $workShop)
    {
        $workShop->address = $request->address;
        $workShop->city = $request->city;
        $workShop->zip = $request->zip;
        $workShop->name = $request->name;
        $workShop->phone = $request->phone;
        $workShop->save();
        return redirect()->route('garage-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkShop  $workShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkShop $workShop)
    {
        $workShop->delete();
        return redirect()->back();
    }
}
