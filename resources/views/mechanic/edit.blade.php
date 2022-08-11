@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-bin">
                    <h3>Edit Workers Info</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <div class="div-box">
                            <div class="card-body edit">
                                <form class="form club" action="{{route('mechanic-update', $mechanic)}}" method="post" enctype="multipart/form-data">
                                    <div class="form-group m">
                                        <div class="form-group">
                                            <label for="mechanic_name">Worker Name</label>
                                            <input type="text" class="form-control" id="mechanic_name" name="mechanic_name" value="{{$mechanic->mechanic_name}}">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ">
                                                <label for="mechanic_surname">Worker Surname</label>
                                                <input type="text" class="form-control" id="mechanic_surname" name="mechanic_surname" value="{{$mechanic->mechanic_surname}}">
                                            </div>
                                         
                                            <li class="list-group-item m-2"><img  src="{{$mechanic->mechanic_image}}" class="rounded float-left edit-img" alt="mechnics image"></li>
                                            <div class="form-group col-md-6 m-2 mt-0">
                                                <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" name="mechanic_image" required>                                                
                                            </div>
                                                                         
                                            <div class="form-group col-md-6 mt-2">
                                                <label for="price">WorkShop</label>
                                                <select class="form-control" name="shop_id">
                                                    @foreach($workShops as $workShop)
                                                    <option value="{{$workShop->id}}" @if($workShop->id == $mechanic->shop_id) selected @endif>{{$workShop->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>                                     
                                        <div class="div-btn-box1 mt-5">
                                            <button class="btn btn-outline-success" type="submit">Update info</button>
                                            <a class="btn btn-outline-primary" href="{{route('mechanic-index')}}">To Mechanics List</a>
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
