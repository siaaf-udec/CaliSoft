import AnalizadorLexico from './analizador-lexico';
import FiltroItems from './filtro-items';

export default class ReglasEstandar{

    constructor(){
        this.calificacionItems = [];
        this.items = null;
        this.idItems = [];
        this.anLex = new AnalizadorLexico();
        this.filItems = new FiltroItems(); 
    }

    evaluarEstandar(code,scriptId,idItems){
        this.idItems = idItems;
        this.items = this.filItems.filtrarItems(this.anLex.scanner(code));
        this.evaluarItems('T_VARIABLE');
        this.evaluarItems('T_CLASS');
        this.evaluarItems('T_FUNCTION');
        this.evaluarItems('T_NAMESPACE');
        this.evaluarItems('T_CONST');
        this.evaluarItems('T_INDENTACION');
        this.evaluarComentarios();
        this.guardarCalificacion(scriptId);
        return this.calificacionItems;  
    }

    evaluarItems(item){
        let totalItems = 0;
        let itemsCorrectos = 0;
        let nota;
        let idItem;
        this.items.forEach( e => {
            if(e.item === item){
                totalItems++;
                if(this.tipoDeEvaluacion(e)){
                   itemsCorrectos++;
                }      
            }
        });
        
        nota = (totalItems > 0) ? (itemsCorrectos/totalItems) : 0;  
        idItem = this.buscarIdItem(item);

        this.calificacionItems.push({
            PK_id : idItem,
            nota : nota, 
            acertadas : itemsCorrectos,
            total : totalItems 
        });
    }
    
    tipoDeEvaluacion(elemento){
        switch(elemento.item){
            case 'T_VARIABLE':
            case 'T_FUNCTION':
            case 'T_CLASS'   : return this.esCamelCase();
            case 'T_CONST'   : return this.esCamelCase();
            case 'T_INDENTACION' : return this.evaluarIndentacion(elemento);
            case 'T_NAMESPACE'   : return this.esCamelCase(); 
         }
    }

    evaluarIndentacion(elemento){
        return elemento.calificacion;
    }

    evaluarComentarios(){
        let nodoAnt = this.items[0];
        let totalItems = 0;
        let itemsCorrectos = 0;
        let nota;
        let idItem;
        this.items.forEach( e =>{
            if(e.atributo === 'T_FUNCTION' || e.atributo === 'T_CLASS'){
                totalItems++;
                if(nodoAnt.atributo === 'T_COMENTARIO' || nodoAnt.atributo === 'T_COMENTARIO_L'){
                    itemsCorrectos++;
                }    
            }
            nodoAnt = e;
        });
        
        nota = (totalItems > 0) ? (itemsCorrectos/totalItems) : 0;  
        idItem = this.buscarIdItem('T_COMENTARIO'); 

        this.calificacionItems.push({
            PK_id : idItem,
            nota : nota, 
            acertadas : itemsCorrectos,
            total : totalItems 
        });
    }

    esCamelCase(){
        return true;
    }

    buscarIdItem(item){
        let nombreItem; 
        switch(item){
            case 'T_VARIABLE'    : nombreItem = 'variables';
                                   break;
            case 'T_FUNCTION'    : nombreItem = 'funciones';
                                   break;
            case 'T_CLASS'       : nombreItem = 'clases';
                                   break;
            case 'T_CONST'       : nombreItem = 'constantes';
                                   break;
            case 'T_NAMESPACE'   : nombreItem = 'espacios de nombre';
                                   break;
            case 'T_INDENTACION' : nombreItem = 'identacion';
                                   break;
            case 'T_COMENTARIO'  : nombreItem = 'comentarios';
                                   break;
        }
        
        let id = this.idItems.find( e =>{
                    return e.item.toLowerCase() == nombreItem;                    
                 });
        return id.PK_id;
    }

    guardarCalificacion(scriptId){
        axios.all([
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[0].PK_id,nota: this.calificacionItems[0].nota,total: this.calificacionItems[0].total,acertadas: this.calificacionItems[0].acertadas,}),
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[1].PK_id,nota: this.calificacionItems[1].nota,total: this.calificacionItems[1].total,acertadas: this.calificacionItems[1].acertadas,}),
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[2].PK_id,nota: this.calificacionItems[2].nota,total: this.calificacionItems[2].total,acertadas: this.calificacionItems[2].acertadas,}),
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[3].PK_id,nota: this.calificacionItems[3].nota,total: this.calificacionItems[3].total,acertadas: this.calificacionItems[3].acertadas,}),
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[4].PK_id,nota: this.calificacionItems[4].nota,total: this.calificacionItems[4].total,acertadas: this.calificacionItems[4].acertadas,}),
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[5].PK_id,nota: this.calificacionItems[5].nota,total: this.calificacionItems[5].total,acertadas: this.calificacionItems[5].acertadas,}),
            axios.put('/api/evaluacionesScript/'+ scriptId,{PK_id: this.calificacionItems[6].PK_id,nota: this.calificacionItems[6].nota,total: this.calificacionItems[6].total,acertadas: this.calificacionItems[6].acertadas,}),
        ]).then(axios.spread((a)=>{
                      
        })).catch(reason => console.log(reason.response.data.errors));
    }
}