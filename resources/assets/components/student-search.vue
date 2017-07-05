<template>
<div class="dropdown">
  <button class="list-group-item list-group-item-info text-center dropdown-toggle" data-toggle="dropdown">
    <div class="text-center">
      <span class="fa fa-plus"></span> Agregar Integrante
    </div>
  </button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li>
          <div class="input-group" style="margin: 10px">
            <input type="text" class="form-control" placeholder="Buscar" v-model="search">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-search"></i>
              </span>
          </div>
      </li>

      <li class="divider"></li>

      <li v-for="user in users">
        <a @click.stop="$emit('selected', user)" class="text-center">{{ `${user.name} - ${user.email}` }}</a>
      </li>
    </ul>
</div>
</template>

<script>
export default {
  data(){
    return { search: "", users: []};
  },
  methods: {
    submit(){
      let params = { name: this.search };
      axios.get('/api/student/search', { params })
        .then(res => this.users = res.data)
    },
  },
  watch: {
    search() {
      this.search && this.submit();
    }
  }
}
</script>
