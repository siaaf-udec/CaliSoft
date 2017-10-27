<template>
    <ul class="list-group">
        <li class="list-group-item list-group-item-success text-center">
          <h4 class="list-group-item-heading"> Total: {{ total }} %</h4>
        </li>
        <li class="list-group-item" v-for="documento in documentos" 
            :class="{'list-group-item-info': documento == active }"
            :key="documento.PK_id">
            <a @click.prevent="$emit('selected', documento)">
                {{ documento.nombre }} ({{ documento.tipo.nombre }})
            </a>
            <span class="badge">{{ prDocumento(documento) }}%</span>

        </li>
    </ul>
</template>

<script>
import _ from "lodash";
export default {
  props: ["documentos", "active"],
  methods: {
    prEvaluador(evaluaciones) {
      return (
        evaluaciones.reduce((sum, ev) => sum + ev.checked, 0) /
        evaluaciones.length
      );
    },
    prDocumento(doc) {
      let evaluadores = _.values(_.groupBy(doc.evaluaciones, "FK_EvaluatorId"));
      let sum = evaluadores.reduce(
        (sum, evs) => sum + this.prEvaluador(evs),
        0
      );
      return Math.round(sum / evaluadores.length * 100);
    }
  },
  computed: {
    total() {
      return (
        this.documentos.reduce((sum, doc) => sum + this.prDocumento(doc), 0) /
        this.documentos.length
      );
    }
  }
};
</script>

