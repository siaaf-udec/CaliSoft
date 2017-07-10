<template>

            <div class="panel panel-info">
                <div class="panel-heading text-center text-uppercase">PROYECTO</div>
                <div class="panel-body bg-info">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td>{{ proyecto.nombre }}</td>
                            </tr>
                            <tr>
                              <th>Integrantes:</th>
                              <td>{{integrantes.join(", ")}}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td class="text-uppercase">{{ proyecto.state }}</td>
                            </tr>
                            <tr>
                                <th>Categoria:</th>
                                <td>{{ proyecto.categoria.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Semillero</th>
                                <td>{{ proyecto.semillero.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Grupo de investigacion:</th>
                                <td>{{ proyecto.grupo_de_investigacion.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Creado el:</th>
                                <td>{{ new Date(proyecto.created_at).toLocaleDateString() }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btn-group btn-group-vertical center-block">
                        <button class="btn blue">Aceptar Proyecto</button>
                        <button class="btn red">Eliminar</button>
                    </div>
                </div>
            </div>

</template>

<script>
export default {
    props: ['proyecto'],
    computed:{
      integrantes(){
        return this.proyecto.usuarios.filter(usuario => usuario.pivot.tipo == 'integrante')
          .map(usuario => usuario.name);
      }
    }
}
</script>
