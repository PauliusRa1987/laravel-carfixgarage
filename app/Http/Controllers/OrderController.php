<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Mechanic;
use App\Models\WorkShop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WorkShop $workShop)
    {
        $facilities = Facility::all();
        $mechanics = Mechanic::all();
        $workShops = WorkShop::all();
        return view('front.create', ['workShop' => $workShop, 'facilities' => $facilities, 'workShops' => $workShops, 'mechanics' => $mechanics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $order = new Order;
        $reqTime = date('Y-m-d H:i', strtotime("$request->timeD $request->timeH"));
        $timeToCount = Carbon::create($reqTime);
        $timeToCount->addMinutes(DB::table('facilities')->where('id', $request->facility_id)->value('duration'));
        $timeFinish = $timeToCount->format('Y-m-d  ').$timeToCount->format('H:i');
        
        $order->user_id = Auth::user()->id;
        $price = DB::table('facilities')->where('id', $request->facility_id)->value('price');
     
        $order->shop_id = $request->shop_id;
        $order->facility_id = $request->facility_id;
        $order->mechanic_id = $request->mechanic_id;
        $order->price =  $price;
        $order->finish_time = $timeFinish;
        $order->save();
        return redirect()->route('front-show', Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(int $userId)
    {
        $orders = Order::where('user_id', $userId)->orderBy('id', 'desc')->get();
        
        return view('front.show', ['orders' =>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $facilities = Facility::all();
        $mechanics = Mechanic::all();
        $workShops = WorkShop::all();
        return view('order.edit', ['order' => $order, 'facilities' => $facilities, 'workShops' => $workShops, 'mechanics' => $mechanics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // dd($request->timeD);
        $timeToCount = Carbon::create($request->timeC);
        $timeFinish = $timeToCount->format('Y-m-d  ').$timeToCount->format('H:i');
        $order->shop_id = $request->shop_id;
        $order->facility_id = $request->facility_id;
        $order->mechanic_id = $request->mechanic_id;
        $order->price = $request->price;        
        $order->finish_time = $timeFinish;
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order-index');
    }
}
