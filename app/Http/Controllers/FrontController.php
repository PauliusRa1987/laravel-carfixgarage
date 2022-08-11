<?php

namespace App\Http\Controllers;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $workShops = match($request->sort){
            'asc' => WorkShop::orderBy('name')->get(),
            'desc' => WorkShop::orderByDesc('name')->get(),
            default => WorkShop::all()
        };
        return view('front.index', ['workShops' => $workShops]);
    }
    public function start()
    {
        
       
       
        return view('front.main');
    }
}
