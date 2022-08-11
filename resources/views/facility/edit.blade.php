@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Edit Facilities Info</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('facility-update', $facility)}}" method="post">
                                    <div class="form-group m">
                                        <div class="form-group">
                                            <label for="facility_name">Facility</label>
                                            <input type="text" class="form-control" id="facility_name" name="facility_name" value="{{$facility->facility_name}}">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="duration">Duration</label>
                                                <input type="text" class="form-control" id="duration" name="duration" value="{{$facility->duration}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" value="{{$facility->price}}">
                                            </div>
                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">WorkShop</label>
                                                <select class="form-control" name="shop_id">
                                                    @foreach($workShops as $workShop)
                                                    <option value="{{$workShop->id}}" @if($workShop->id == $facility->shop_id) selected @endif>{{$workShop->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>                                       
                                        <div class="div-btn-box1 mt-5">
                                            <button class="btn btn-outline-success" type="submit">Update info</button>
                                            <a class="btn btn-outline-primary" href="{{route('facility-index')}}">To Facilities List</a>
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
