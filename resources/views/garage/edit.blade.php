@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Edit WorkShops Info</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('garage-update',$workShop)}}" method="post">
                                    <div class="form-group m">
                                        <div class="form-group">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address" value="{{$workShop->address}}">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity">City</label>
                                                <input type="text" class="form-control" id="inputCity" name="city" value="{{$workShop->city}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputZip">Zip</label>
                                                <input type="text" class="form-control" id="inputZip" name="zip" value="{{$workShop->zip}}">
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="name">WorKShops name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$workShop->name}}">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="phone">WorKShops Phone number</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{$workShop->phone}}">
                                        </div>
                                        <div class="div-btn-box1 mt-5">
                                            <button class="btn btn-outline-success" type="submit">Update info</button>
                                            <a class="btn btn-outline-primary" href="{{route('garage-index')}}">To list of WorkShops</a>
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
