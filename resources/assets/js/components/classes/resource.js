import axios from 'axios'

export default class Resource {

    /**
     * 
     * @param {string} url
     * @param {string | number} id Identificador del elemento
     */
    constructor(url, id){
        this.url = url;
        this.axios = axios;
        this.id = id;
    }

    /**
     * Retorna todos elementos
     * @return { Promise< any[] > }
     */
    all() {
        return axios.get(this.url).then(res => res.data);
    }

    /**
     * Crea un nuevo elemento
     * @param {any} item 
     * @return {Promise}
     */
    store(item){
        return axios.post(this.url, item).then(res => res.data);
    }

    /**
     * Actualiza un elemento
     * @param {any} item 
     */
    update(item){
        return axios.put(this.url + item[this.id]).then(res => res.data);
    }

    /**
     * Elimina un elemento
     * @param {any} item 
     */
    destroy(item){
        return axios.delete(this.url + item[this.id]).then(res => res.data)
    }

}