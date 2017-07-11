<template>
    <form>
    <div class="form-group form-md-line-input">
        <div class="input-icon">
        <i class="fa fa-cubes"></i>
        <input type="text" name="name" required="" placeholder="Nombre Del Proyecto" class="form-control" autocomplete='off'/>
        </div>
    </div>
    <div class="form-group form-md-line-input">
        <div class="input-icon">
            <i class="fa fa-users"></i>
            <label>Categoria</label>
            <select id="role" class="form-control" required>
                <option value="admin">Administrador</option>       
            </select>
        </div>
    </div>
    <div class="form-group form-md-line-input">
        <div class="input-icon">
            <i class="fa fa-users"></i>
            <label>Semillero</label>
            <select id="role" class="form-control" required>
                <option value="admin">Administrador</option>       
            </select>
        </div>
    </div>
     <div class="form-group form-md-line-input">
        <div class="input-icon">
            <i class="fa fa-users"></i>
            <label>Grupo de investigacion</label>
            <select id="role" class="form-control" required>
                <option value="admin">Administrador</option>       
            </select>
        </div>
    </div>
    </form>
</template>
<script>

export default{
    props:["proyecto"]
}
</script>