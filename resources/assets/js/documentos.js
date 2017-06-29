import "./bootstrap";
import Vue from "vue";


new Vue({
    el: "#app",
    data: { 
            documentos: [],
            newDocumentos: {},
            fillDocumentos: {},
            formErrors: {},
            formErrorsUpdate: {},
            tiposDocumentos: [],
            proyectoId: '',
            image: ''
            },


    created(){
        
       // axios.get(`/api/tdocumentos/${this.documentoId}/componentes`)
         //   .then(res => this.componentes = res.data);

        axios.get(`/api/tdocumentos`)
            .then(res => this.tiposDocumentos = res.data);

    },

    methods:{


        openEditModal(documentos) {
            this.fillDocumentos = Object.assign({}, documentos);
            $('#editar-documentos').modal("show");
        },

        store(idfk){
            this.newDocumentos.FK_ProyectoId = idfk;
            axios.post('../api/documentacion/',this.newDocumentos)
            .then(res => this.documentos.push(res.data))
        },

         onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function (e) {
      this.image = '';
    }

        }
});
