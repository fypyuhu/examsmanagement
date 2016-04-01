    @foreach($options as  $key => $value)
     @include('partials.label.label',['value'=>"$key : ".$value])
        
        
    @endforeach
    