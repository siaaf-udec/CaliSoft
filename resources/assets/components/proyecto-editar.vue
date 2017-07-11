<template>
    <form>
    <div class="form-group form-md-line-input">
        <div class="input-icon">
        <i class="fa fa-user"></i>
        <input type="text" name="name" required="" placeholder="Nombre" class="form-control" autocomplete='off'/>
        </div>
    </div>
    <div class="form-group">
         <label>Categoria</label>
        <select class="form-control">
        <option>Option 1</option>
        </select>
     </div>
    <div class="form-group">
         <label>Semillero</label>
        <select class="form-control">
        <option>Option 1</option>
        </select>
     </div>
     <div class="form-group">
         <label>Grupo de investigacion</label>
        <select class="form-control">
        <option>Option 1</option>
        </select>
     </div>
    </form>
</template>
<script>

export default{
    props:["proyecto"]
}
</script>