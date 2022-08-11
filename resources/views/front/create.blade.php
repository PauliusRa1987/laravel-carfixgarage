@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>New Order</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('front-store', $workShop)}}" method="post">
                                    <div class="form-group m">
                                        <div class="form-row">
                                            <div class="form-group ">
                                                <label for="timeC">WorkShop:</label>
                                                <input type="text" class="form-control" id="time" name="name" value="{{$workShop->name}}" readOnly>
                                            </div>
                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">Action:</label>
                                                <select class="form-control" name="facility_id">
                                                  @foreach($facilities as $facility)
                                                  @if($facility->shop_id == $workShop->id)<option value="{{$facility->id}}">{{$facility->facility_name}} --> Price: ${{$facility->price}}</option>@endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">Mechanic</label>
                                                <select class="form-control" name="mechanic_id">
                                                    @foreach($mechanics as $mechanic)
                                                    @if($mechanic->shop_id == $workShop->id)<option value="{{$mechanic->id}}">{{$mechanic->mechanic_name}} {{$mechanic->mechanic_surname}}</option>@endif
                                                    
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="form-group ">
                                                <label for="user_id">Ordered By:</label>
                                                <input type="text" class="form-control" id="mechanic_surname" name="user_id" value="{{$order->getUserId->name}}" readOnly>
                                            </div>--}}
                                           
                                                <input type="hidden" class="form-control" id="price" name="shop_id" value="{{$workShop->id}}">
                                            {{--
                                            <div class="form-group ">
                                                <label for="time">Orderet_at</label>
                                                <input type="text" class="form-control" id="time" name="time" value="{{$order->created_at}}" readOnly>
                                            </div> --}}
                                            <div class="form-group ">
                                                <label >Date of reservation</label>
                                                <div class="form-row div-btn-box">
                                                <div class="col-5">
                                                <input type="date" class="form-control "  name="timeD" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                <input type="time" class="form-control"  name="timeH" >
                                                </div>
                                                </div>
                                            </div> {{--
                                            <div>Status:<select class="form-control" name="status">
                                                    <option value="done" @if($order->status == 'done') selected @endif>Done!</option>
                                                    <option value="in_progress" @if($order->status == 'in_progress') selected @endif>In Progress</option>
                                                    <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                                                    <option value="approved" @if($order->status == 'approved') selected @endif>Approved</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                        <div class="div-btn-box1 mt-5">

                                            <button class="btn btn-outline-success" type="submit">Update info</button>
                                            <a class="btn btn-outline-primary" href="{{route('front-index')}}">Order List</a>
                                            @csrf

                                        </div>
                                        
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
