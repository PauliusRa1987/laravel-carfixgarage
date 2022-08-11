@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Orders Nr.{{$order->id}} Info</h3>
                    <form action="{{route('order-delete', $order)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                    </form>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('order-update', $order)}}" method="post">
                                    <div class="form-group m">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">WorkShop</label>
                                                <select class="form-control" name="shop_id">
                                                    @foreach($workShops as $workShop)
                                                    <option value="{{$workShop->id}}" @if($workShop->id == $order->shop_id) selected @endif>{{$workShop->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">Product</label>
                                                <select class="form-control" name="facility_id">
                                                    @foreach($facilities as $facility)
                                                    <option value="{{$facility->id}}" @if($facility->id == $order->facility_id) selected @endif>{{$facility->facility_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">Mechanic</label>
                                                <select class="form-control" name="mechanic_id">
                                                    @foreach($mechanics as $mechanic)
                                                    <option value="{{$mechanic->id}}" @if($mechanic->id == $order->mechanic_id) selected @endif>{{$mechanic->mechanic_name}} {{$mechanic->mechanic_surname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="user_id">Ordered By:</label>
                                                <input type="text" class="form-control" id="mechanic_surname" name="user_id" value="{{$order->getUserId->name}}" readOnly>
                                            </div>
                                            <div class="form-group ">
                                                <label for="price">Total Amount</label>
                                                <input type="text" class="form-control" id="price" name="price" value="{{$order->price}}">
                                            </div>
                                            <div class="form-group ">
                                                <label for="time">Order Time:</label>
                                                <input type="text" class="form-control" id="time" name="time" value="{{$order->created_at}}" readOnly>
                                            </div>
                                            <div class="form-group ">
                                                <label for="timeC">Will be completed by:</label>
                                                <input type="datetime-local" class="form-control" id="time" name="timeC" value="{{date('Y-m-d H:i', strtotime($order->finish_time))}}">
                                            </div>
                                            <div>Status:<select class="form-control" name="status">
                                                    <option value="done" @if($order->status == 'done') selected @endif>Done!</option>
                                                    <option value="in_progress" @if($order->status == 'in_progress') selected @endif>In Progress</option>
                                                    <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                                                    <option value="approved" @if($order->status == 'approved') selected @endif>Approved</option>
                                                    <option value="finished" @if($order->status == 'finished') selected @endif>Finished</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="div-btn-box1 mt-5">

                                            <button class="btn btn-outline-success" type="submit">Update info</button>
                                            <a class="btn btn-outline-primary" href="{{route('order-index')}}">Order List</a>
                                            @csrf

                                        </div>
                                        @method('put')
                                    </div>
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
