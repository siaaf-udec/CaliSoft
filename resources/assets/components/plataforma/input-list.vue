<template>
    <section>
        <div class="dashboard-stat2 ">
            <div class="display">
                <div class="number">
                    <h3 v-if="totales == 30" class="font-green-sharp">
                        <span data-counter="counterup" :data-value="totales" v-text="totales"></span>
                    </h3>
                    <h3 v-if="totales != 30" class="font-red-haze">
                        <span data-counter="counterup" :data-value="totales" v-text="totales"></span>
                    </h3>
                        <small>Barra de proceso</small>
                </div>
                <div class="icon">
                    <i class="icon-like"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span v-if="totales == 30" :style="{ width: porcentaje.toString() + '%' }" class="progress-bar progress-bar-danger green-sharp">
                        <span class="sr-only">85% change</span>
                    </span>
                    <span v-if="totales != 30" :style="{ width: porcentaje.toString() + '%' }" class="progress-bar progress-bar-danger red-haze">
                        <span class="sr-only">85% change</span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> Porcentaje </div>
                    <div class="status-number" > {{porcentaje.toString()}}% </div>
                </div>
            </div>
        </div>
        <form>
            <table class="table table-striped table-bordered table-hover" id="sample">
                <thead>
                    <tr>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Reglas</th>
                        <th class="text-center">Input</th>
                        <th class="text-center">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(input,index) in formulario" :key="index" class="text-center">
                        <td>{{ input.type }}</td>
                        <td>{{ input.name || input.id || index }}</td>
                        <td>{{ reglas[index] }}</td>
                        <td>
                            <input class="form-control" v-bind="input" :value="values[index]"  v-validate="reglas[index]"
                                @input="values[index] = $event.target.value">
                            <span class="text-danger" v-if="errors.has(input.name)">
                                {{ errors.first(input.name) }}
                            </span>
                        </td>
                        <td>
                            <span class="fa fa-check text-success" v-if="resultados[index]"></span>
                            <span class="fa fa-close text-danger" v-else></span> 
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr v-if="values.length" class="active">
                        <th colspan="4">CALIFICACIÓN</th>
                        <th class="text-center">
                            {{ calificacion }}%
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
        <div class="row" v-if="totales<30">
            <div class="col-md-4">
                <button class="btn green-jungle btn-block" @click="cargar()">
                    <i class="fa fa-plus"></i> Cargar prueba   
                </button>
            </div>
            <div class="col-md-4 col-md-offset-4" v-if="values.length">
                <button class="btn btn-block btn-primary" @click="guardar()">
                    <i class="fa fa-save"></i>GUARDAR PRUEBA
                </button>
            </div>
        </div>
    </section>

</template>

<script>
import {
  parseRule,
  parseInputs
} from "../../classes/plataforma/input-attributes";
import { mean } from "lodash";
export default {
  props: ["formulario", "casoPruebaId"],
  data() {
    return {
      values: [],
      tipos: ["normal", "sql", "xss"],
      selected: -1,
      valido: 0,
      totales: 0,
      porcentaje: 0
    };
  },
  created() { 
        this.refresh();       
        
    },
  methods: {
    refresh() {
        axios.get(`/pruebasCasoPrueba/${window.casoPruebaId}`)
        .then(res => {this.totales = res.data,
                this.porcentaje = Math.round(((res.data * 100) / 30));
        });
        //this.porcentaje= (this.totales + 100);
    },
    cargar() {
      this.select();

      axios
        .post("/api/testing", {
          inputs: this.formulario.map(input => input.type),
          tipo: this.tipos[this.selected]
        })
        .then(response => {
          this.values = response.data.values;
          this.valido = response.data.valido;
          setTimeout(() => this.validar());
        });
    },
    validar() {
      this.$validator.validateAll();
    },
    select() {
      this.selected += 1;
      if (this.selected >= this.tipos.length) {
        this.selected = 0;
      }
    },
    guardar() {
      let contexto = this.formulario.map((input, index) => ({
        nombre: input.name,
        entrada: this.values[index],
        estado: this.resultados[index]
      }));
      axios
        .post("/api/testing/save/" + this.casoPruebaId, {
          contexto: contexto,
          calificacion: this.calificacion
        })
        .then(() => {
            toastr.success('Prueba Guardada')
            this.refresh();
            this.values = [];
            this.errors.clear()
        });
    }
  },
  computed: {
    reglas() {
      return parseInputs(this.formulario);
    },
    resultados() {
      return this.formulario.map(
        input => this.errors.has(input.name) != this.valido
      );
    },
    calificacion() {
      return mean(this.resultados) * 100;
    }
  }
};
</script>
