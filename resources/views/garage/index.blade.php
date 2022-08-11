@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>WorkShops</h3>
                    @if(isset(Auth::user()->role) && Auth::user()->role > 9)
                    <div class="header-box">
                        <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('garage-create')}}">Add new WorkShop</a>
                    </div>
                    @else
                    <div class="header-box">
                        <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('front-start')}}">Back to front</a>
                    </div>
                    @endif
                    
                </div>
                <div class="card-body card-bin">
                    @foreach($workShops as $workShop)
                    <div class="card col-4 m-4">
                        <div class="card-header ">
                           <h3> {{$workShop->name}} Garage</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Address: </b><i>{{$workShop->address}}</i></li>
                                <li class="list-group-item"><b>City: </b><i>{{$workShop->city}}</i></li>
                                <li class="list-group-item"><b>Post Code: </b><i>{{$workShop->zip}}</i></li>
                                <li class="list-group-item"><b>Phone: </b><i>{{$workShop->phone}}</i></li>
                            </ul>
                            @if(isset(Auth::user()->role) && Auth::user()->role > 9)
                            <div class="div-btn-box">
                                <a class="btn btn-outline-success m-2 link-btn" href="{{route('garage-edit', $workShop)}}">Edit WorShops info</a>
                                <form action="{{route('garage-delete', $workShop)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
