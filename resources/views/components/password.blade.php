<div class="form-group form-md-line-input">
    <div class="input-icon">
        <input {!! $attributes !!} class="form-control" id="{{ $name }}" name="{{ $name }}" type="password">
        <label for="{{$name}}" class="control-label">{{ $label }}</label>
        <span class="help-block"> {{ $help }} </span>
        <i class="fa fa-key"></i>
    </div>
</div>