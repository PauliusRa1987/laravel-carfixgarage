@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Mechanic profile</h3>
                    <div class="header-box">
                        <a class="btn btn-outline-primary btn-sm link-btn" href="">WorkShop Pick</a>
                    </div>
                </div>
            
        <div class="card-body card-bin">

            <div class="card col-4 m-4">
                <div class="card-header ">
                    <h3> {{$mechanic->mechanic_name}} {{$mechanic->mechanic_surname}}</h3><i></i>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item centre"><img src="{{$mechanic->mechanic_image}}" class="rounded float-left" alt="mechnics image"></li>
                        <li class="list-group-item"><b>Works At: </b><i>{{$mechanic->getShopInfo->name}} WorkShop</i></li>
                        <li class="list-group-item stars"><b>Rating: </b><i> {{round($mechanic->rate, 2)}}</i>
                            @if(isset(Auth::user()->role) && Auth::user()->role == 1)
                            @include('mechanic.rating')
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
