@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Orders List</h3>
                    <div class="header-box">
                        <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('front-index')}}">WorkShop Pick</a>
                    </div>
                </div>
                <div class="card-body card-bin">
                    <li class="list-group-item centre">
                        <table class="table">
                            <thead>
                                <tr class="class">                                    
                                    <th scope="col">Client</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Master</th>
                                    <th scope="col">WorkShop</th>
                                    <th scope="col">Orderet_at</th>
                                    <th scope="col">Approx finish</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                    </li>
                    @foreach($orders as $order)
                    <li class="list-group-item">

                        <tr class="class">
                            
                            <td>{{$order->getUserId?->name??0}}</td>
                            <td>{{$order->getFacilityId?->facility_name??0}}</td>
                            <td>{{$order->getMasterId?->mechanic_name??0}} {{$order->getMasterId?->mechanic_surname??0}}</td>
                            <td>{{$order->getShopId?->name??0}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->finish_time}}</td>
                            <td>{{$order->status}}</td>
                            @if(Auth::user()->role > 9)
                            <td><a class="btn btn-outline-success m-2 link-btn" href="{{route('order-edit', $order)}}">Show details</a></td>
                            @endif
                        </tr>

                    </li>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
