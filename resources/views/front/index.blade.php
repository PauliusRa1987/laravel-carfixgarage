@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Wellcome</h3>
                    <div class="header-box">
                    <small>Sort:</small>
                        <a class="m-2 sort" href="{{route('front-index', ['sort' => 'asc'])}}">A-Z</a>
                        <a class="sort" href="{{route('front-index', ['sort' => 'desc'])}}">Z-A</a>
                    </div>
                </div>
                <div class="card-body card-bin">
                    @foreach($workShops as $workShop)
                    <div class="card col-4 m-4">
                        <div class="card-header ">
                            <h3>{{$workShop->name}}</h3><i></i>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Address: </b><i> {{$workShop->address}}</i></li>
                                <li class="list-group-item"><b>Phone: </b><i> {{$workShop->phone}}</i></li>
                            </ul>
                            <div class="div-btn-box">
                                <a class="btn btn-outline-success m-2 link-btn" href="{{route('front-create', $workShop)}}">Pick WorkShop!</a>
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
