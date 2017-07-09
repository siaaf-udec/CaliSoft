<template>
  <section>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar" v-model="search">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-search"></i>
        </span>
    </div>
    <ul class="list-group" style="margin-top: 2%">
      <li class="list-group-item" v-for="user in users">
        {{ `${user.name} - ${user.email}` }}
        <button class="btn btn-success btn-xs pull-right" @click="invite(user)">
          invitar
        </button>
      </li>
    </ul>
  </section>
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
    invite(user){
      this.$emit('invite', user);
      this.users = [];
    }
  },
  watch: {
    search() {
      this.search && this.submit();
    }
  }
}
</script>
