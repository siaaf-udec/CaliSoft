<template>
<section>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar" v-model="search">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-search"></i>
        </span>
    </div>
    <ul class="list-group" style="margin-top: 2%">
        <li class="list-group-item" v-for="user in this.paginator.items">
            {{ `${user.name} - ${user.email}` }}
            <button class="btn btn-success btn-xs pull-right" @click="$emit('selected', user)">
          {{ buttonText }}
        </button>
        </li>
        <div class="text-center">
            <pager :show="paginator.show" :last-page="paginator.lastPage" :page="paginator.page" @change="changePage"></pager>
        </div>
    </ul>

</section>
</template>

<script>
import Paginator from './classes/paginator';
import Pager from './utils/pager';

export default {
    components: { Pager },
    props: ['url', 'buttonText'],
    data() {
        return {
            search: "",
            users: [],
            paginator: new Paginator()
        };
    },
    created(){
        axios.get(this.url).then(res => {
            this.users = res.data
            this.paginator.data = this.users
        })
    },
    methods: {
        changePage(page){
            this.paginator.page = page;
            this.$forceUpdate();
        }
    },
    watch: {
        search(query) {
            let data =  this.users;
            if(query) {
                data = this.users.filter(u => {
                    return new RegExp(query, 'i').test(`${u.name} ${u.email}`)
                });
            }
            this.paginator.data = data;
            this.$forceUpdate();
        }
    }
}
</script>
