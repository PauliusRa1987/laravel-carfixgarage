<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Order;
use App\Models\WorkShop;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\default_user_agent;

class MechanicController extends Controller
{

    public function filter(Request $request)
    {
        


    }
    public function rate(Request $request, Mechanic $mechanic, Order $order)
    {
        // dd($mechanic->id);
        $mechanic->mechanic_rating += $request->rate;
        $mechanic->rate_count += 1;
        $mechanic->rate = $mechanic->mechanic_rating/$mechanic->rate_count;
        $mechanic->save();
        Order::where('mechanic_id', $mechanic->id)->update(array('status' => 'finished'));
        return redirect()->route('front-show', Auth::user()->id)->with(['hidden' => true]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $workShops = WorkShop::all();

        if (!$request->shop_id) {
            $mechanics = match($request->sort){
                'low' => Mechanic::orderBy('rate')->get(),
                'high' => Mechanic::orderByDesc('rate')->get(),
                default => Mechanic::all()
               
            };
            $filter = 0;  
        }else{
            $mechanics = match($request->sort){
                'low' => DB::table('work_shops')
                ->join('mechanics', 'mechanics.shop_id', '=', 'work_shops.id')
                ->select('mechanics.*', 'work_shops.*')
                ->where('mechanics.shop_id', $request->shop_id)
                ->orderBy('rate')
                ->get(),
                'high' => DB::table('work_shops')
                ->join('mechanics', 'mechanics.shop_id', '=', 'work_shops.id')
                ->select('mechanics.*', 'work_shops.*')
                ->where('mechanics.shop_id', $request->shop_id)
                ->orderByDesc('rate')
                ->get(),
                default => DB::table('work_shops')
                ->join('mechanics', 'mechanics.shop_id', '=', 'work_shops.id')
                ->select('mechanics.*', 'work_shops.*')
                ->where('mechanics.shop_id', $request->shop_id)
                ->get()
            };
            $filter = $request->shop_id; 
            
        }
        // , ['mechanics' => $mechanics, 'workShops' => $workShops, 'filter' => $filter]
        return view('mechanic.index', ['mechanics' => $mechanics, 'workShops' => $workShops, 'filter' => $filter]);
        // $html = view('mechanic.filter')->with(['mechanics' => $mechanics, 'workShops' => $workShops, 'filter' => $filter])->render();
        // return response()->json([
        //     'html' => $html
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workShops = WorkShop::all();
        return view('mechanic.create', ['workShops' => $workShops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMechanicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mechanic = new Mechanic;
        if ($request->file('mechanic_image')) {
            $photo = $request->file('mechanic_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/img', $file);
            $mechanic->mechanic_image = asset('/img') . '/' . $file;
        }

        $mechanic->mechanic_name = $request->mechanic_name;
        $mechanic->mechanic_surname = $request->mechanic_surname;
        $mechanic->shop_id = $request->shop_id;
        $mechanic->save();

        return redirect()->route('mechanic-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        // $mechanics = Mechanic::all();
        return view('mechanic.show', ['mechanic' => $mechanic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        $workShops = WorkShop::all();
        return view('mechanic.edit', ['mechanic' => $mechanic, 'workShops' => $workShops]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMechanicRequest  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        if ($request->file('mechanic_image')) {
            $name = pathinfo($mechanic->mechanic_image, PATHINFO_FILENAME);
            $ext = pathinfo($mechanic->mechanic_image, PATHINFO_EXTENSION);
            $path = public_path('/img') . '/' . $name . '.' . $ext;
            if ($name = '') {
                unlink($path);
            }
            $photo = $request->file('mechanic_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(200, 200);
            $img->save(public_path().'/img/'.$file);
            $mechanic->mechanic_image = asset('/img') . '/' . $file;
        }


        $mechanic->mechanic_name = $request->mechanic_name;
        $mechanic->mechanic_surname = $request->mechanic_surname;

        $mechanic->shop_id = $request->shop_id;
        $mechanic->save();

        return redirect()->route('mechanic-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic, Request $request)
    {
        if ($mechanic->mechanic_image) {
            $name = pathinfo($mechanic->mechanic_image, PATHINFO_FILENAME);
            $ext = pathinfo($mechanic->mechanic_image, PATHINFO_EXTENSION);
            $path = public_path('/img') . '/' . $name . '.' . $ext;
            if ($path) {
                unlink($path);
            }
        }

        $mechanic->delete();
        return redirect()->back();
    }
}
