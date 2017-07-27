
{{-- fileinput
    ** args
    img -> Titulo del desplegable
    class -> clase del img

--}}

@if($img == null)
    <img alt="" class="{{$class}}" src="{{asset('uploads/fotos/profile.png')}}" />
@else
    <img alt="" class="{{$class}}" src="{{asset('uploads/fotos/'.$img)}}" />

@endif
