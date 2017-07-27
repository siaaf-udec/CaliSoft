
{{-- fileinput
    ** args
    title1 -> Titulo del desplegable
    label1 -> label cambiar
    label2 -> label quitar
    url -> url de la imagen
    name -> nombre del input
    attributes -> atributo del input
--}}

<div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                                                @if($url == null)
                                                    <img src="{{asset('uploads/fotos/profile.png')}}" alt=""  id="fotografia_usuario" />
                                                @else
                                                <img alt="" src="{{asset('uploads/fotos/'.$url)}}" id="fotografia_usuario" />
                                                @endif

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new">{{$title1}}</span>
                                                <span class="fileinput-exists">{{$label1}}</span>
                                                <input name="{{$name}}" type="file" class="archivo form-control" {{$attributes}}/>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> {{$label2}} </a>
                                            </div>
                                        </div>
                                    </div>
