import './bootstrap'
import Vue from 'vue'

new Vue({
    el: '#app',
    data: {
        proyectos: []
    },
    created() {
        axios.get('/api/user/proyectos').then(res => this.proyectos = res.data)
    }
})