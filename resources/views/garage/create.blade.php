@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Add new WorkShop</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('garage-store')}}" method="post">
                                    <div class="form-group m">
                                        <div class="form-group">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity">City</label>
                                                <input type="text" class="form-control" id="inputCity" name="city">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputZip">Zip</label>
                                                <input type="text" class="form-control" id="inputZip" name="zip">
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="name">WorKShops name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="phone">WorKShops Phone number</label>
                                            <input type="text" class="form-control" id="phone" name="phone">
                                        </div>
                                        <div class="div-btn-box1 mt-4">
                                            <button class="btn btn-outline-success " type="submit">Add</button>
                                            <a class="btn btn-outline-primary" href="{{route('garage-index')}}">To list of WorkShops</a>
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
