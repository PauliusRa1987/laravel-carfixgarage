
@foreach($mechanics as $mechanic)
<div class="card col-4 m-4">
    <div class="card-header ">
        <h3> {{$mechanic->mechanic_name}} {{$mechanic->mechanic_surname}}</h3><i></i>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item centre"><img src="{{$mechanic->mechanic_image}}" class="rounded float-left" alt="mechnics image"></li>
            <li class="list-group-item"><b>Works At: </b><i>{{$mechanic->name}} WorkShop</i></li>
            <li class="list-group-item stars"><b>Rating: </b><i> {{round($mechanic->rate, 2)}}</i>

            </li>
        </ul>
        <div class="div-btn-box">
            @if(isset(Auth::user()->role) && Auth::user()->role > 9)
            <a class="btn btn-outline-success m-2 link-btn" href="{{route('mechanic-edit', $mechanic)}}">Edit Workers info</a>
            <form action="{{route('mechanic-delete', $mechanic)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endforeach
