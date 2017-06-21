{{-- Bootstrap Select
    ** args
    items -> Icono del desplegable
    title -> Titulo del desplegable
--}}


<div class="form-group">
    <label class="control-label col-md-3">{{ $title }}</label>
        <div class="col-md-4">
            <select class="bs-select form-control">
                <option>{{ $items }}</option>
                
            </select>
        </div>
</div>