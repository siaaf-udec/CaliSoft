import Resource from './resource';


export default class ProjectResource extends Resource {

    constructor(){
        super('/api/proyectos/', 'PK_id')
    }
}