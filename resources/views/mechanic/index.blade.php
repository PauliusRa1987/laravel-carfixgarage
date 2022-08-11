@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Mechanic List</h3>
                    <div class="header-box">
                        <div class="div-btn-box1">
                            <div class="div-btn-box1 margin">
                                <form class="div-btn-box1 "  action="{{route('mechanic-index')}}" method="get">
                                    <small class="margin">Filter by WorkShop:</small>
                                 
                                    <select class="form-control" name="shop_id">
                                        <option value="0" @if($filter==0) selected @endif>No Filter</option>
                                        @foreach($workShops as $workShop)
                                        <option value="{{$workShop->id}}" @if($filter==$workShop->id) selected @endif>{{$workShop->name}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-success m-2 " type="submit">Filter</button>
                                </form>
                            </div>
                            <div class="margin">
                                <small>Sort by Rating:</small>
                                <a class="m-2 sort" href="{{route('mechanic-index', ['sort' => 'high'])}}">High</a>
                                <a class="sort" href="{{route('mechanic-index', ['sort' => 'low'])}}">Low</a>
                            </div>
                            @if(isset(Auth::user()->role) && Auth::user()->role > 9)
                            <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('mechanic-create')}}">Add new Worker</a>
                            @else
                            <div class="header-box">
                                <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('front-start')}}">Back to front page</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-body card-bin filter--mech">
                    @include('mechanic.filter')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
