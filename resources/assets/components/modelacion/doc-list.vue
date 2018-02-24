<template>
    <ul class="list-group">
        <li class="list-group-item list-group-item-success text-center" v-if="total">
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
      return _.meanBy(evaluaciones, "checked");
    },
    prDocumento(doc) {
      let evaluadores = _.values(_.groupBy(doc.evaluaciones, "FK_EvaluatorId"));
      return _.meanBy(evaluadores, ev => this.prEvaluador(ev)) * 100;
    }
  },
  computed: {
    total() {
      return _.meanBy(this.documentos, doc => this.prDocumento(doc));
    }
  }
};
</script>

