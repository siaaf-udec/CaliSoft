import "./bootstrap";
import Vue from "vue";
import ProyectoVista from "../components/proyecto-vista";

new Vue({
    el: '#app',
    render: h => h(ProyectoVista)
});
