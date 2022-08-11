@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Add new Facility</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('facility-store')}}" method="post">
                                    <div class="form-group m">
                                        <div class="form-group">
                                            <label for="facility_name">Facility Name</label>
                                            <input type="text" class="form-control" id="facility_name" name="facility_name">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="duration">Duration</label>
                                                <input type="text" class="form-control" id="duration" name="duration">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price">
                                            </div>
                                            <div class="form-group col-md-4 mt-2">
                                                <label for="price">WorkShops</label>
                                                <select class="form-control" name="shop_id">
                                                <option value="">-Choose One-</option>
                                                    @foreach($workShops as $workShop)
                                                    <option value="{{$workShop->id}}">{{$workShop->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="div-btn-box1 mt-4">
                                            <button class="btn btn-outline-success " type="submit">Add</button>
                                            <a class="btn btn-outline-primary" href="{{route('facility-index')}}">To Facilities List</a>
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
