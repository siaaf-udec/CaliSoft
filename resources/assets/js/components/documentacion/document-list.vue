<template>
    <ul class="list-group">
        <li class="list-group-item" v-for="tipo in tipos" :key="tipo.PK_id">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <span class="label label-success">{{ tipo.nombre }}</span>
                    <span class="label label-primary" v-show="tipo.required">r</span>
    
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="text-right">
                        <popover v-for="doc in filter(tipo)" :title="doc.url" :key="doc.PK_id">
                            <a href="#" class="label label-danger" data-role="trigger" style="margin-left: 1%">
                                <span class="fa fa-file-pdf-o"></span>
                                {{ doc.url }}
                            </a>
                            <div slot="popover" class="text-center">
                                
                                <a title="editar" class="editar-categoria btn btn-warning btn-xs" @click.prevent="$emit('edit', doc)">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
            
                                <a title="descargar" class="btn btn-info btn-xs" :href="`/api/downloadFile/${doc.url}`">
                                    <span class="glyphicon glyphicon-download-alt"></span>
                                </a>
            
                                <a title="ver" class="btn btn-success btn-xs" :href="`/api/seeFile/${doc.url}`" target="_blank">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
            
                                <a title="eliminar" class="editar-modal btn btn-danger btn-xs" @click.prevent="$emit('destroy', doc)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </popover>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>


<script>
import { Popover } from 'uiv';

export default {
    props: ['documentos', 'tipos'],
    components: { Popover },
    methods: {
        filter(tipo) {
            return this.documentos.filter(doc => doc.FK_TipoDocumentoId == tipo.PK_id)
        }
    }
}
</script>
