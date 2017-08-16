import './bootstrap'
import Vue from 'vue'
import BsSwitch from './components/bs/bs-switch'

new Vue({
    el: '#app',
    data: {
        proyectos: []
    },
    created() {
        axios.get('/api/user/proyectos').then(res => this.proyectos = res.data)
    }
})