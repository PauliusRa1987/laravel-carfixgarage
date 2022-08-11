@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Facilities List</h3>
                    <div class="header-box">
                    @if(isset(Auth::user()->role) && Auth::user()->role > 9)
                        <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('facility-create')}}">Add new Facility</a>
                    @else
                    <div class="header-box">
                        <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('front-start')}}">Back to front page</a>
                    </div>
                    @endif
                    </div>
                </div>
                <div class="card-body card-bin">
                    @foreach($facilities as $facility)
                    <div class="card col-4 m-4">
                        <div class="card-header ">
                        
                            <h3> {{$facility->facility_name}}</h3><i>({{$facility->getShopInfo->city}})</i>
                        
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>At: </b><i>{{$facility->getShopInfo->name}} WorkShop</i></li>
                                <li class="list-group-item"><b>Duration: </b><i>{{$facility->duration}} min</i></li>
                                <li class="list-group-item"><b>Price: </b><i>$ {{$facility->price}}</i></li>
                            </ul>
                            <div class="div-btn-box">
                            @if(isset(Auth::user()->role) && Auth::user()->role > 9)
                                <a class="btn btn-outline-success m-2 link-btn" href="{{route('facility-edit', $facility)}}">Edit Facility info</a>
                                <form action="{{route('facility-delete', $facility)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                                </form>
                            @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
