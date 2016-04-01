    @foreach($options as  $key => $value)
    
       
        <div class="radio">
            
            <label><input name="option" id="1" value="{{$key}}" type="radio"> {{$value}}</label>
        </div>
       
    @endforeach
    