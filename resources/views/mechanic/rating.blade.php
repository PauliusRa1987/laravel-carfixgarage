    <form action="{{route('mechanic-rate', $mechanic)}}" method="POST">
        <div class="div-btn-box">
            <div class="form-group col-1.5 m-2">
                <select name="rate" class="form-control">
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                </select>
            </div>
            <button class="btn btn-outline-danger m-2 " type="submit">Rate!</button>
        </div>
        @csrf
    </form>




    {{--
        <div class="form-group required  magic--rating">
       
          <div class="col-sm-12 mol">
           <input class="mms" value=""  type="text" name="ratio" />
            <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
            <label class="star star-1" for="star-1"></label>
           </div>
        </div> --}}
