<template>
    <form>
       
        <table class="table table-striped table-bordered table-hover" id="sample">
            <tbody>
                <tr v-for="(input,index) in formulario" :key="index">
                    <td class="text-center"  >
                        
                         {{ getTipo(input).nombre }} 
                        
                    </td>
                    <td class="text-center"> 
                        <component :is="'t-'+input.type" :input="input" v-model="input.value" > </component>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn green-jungle center-block">
            <i class="fa fa-plus"></i>
                Iniciar prueba   
        </button>
    </form>

</template>

<script>
import tText from "./t-text";
import tEmail from "./t-email";
import tPassword from "./t-password";
import tNumber from "./t-number";
import tUrl from "./t-url";
import tDate from "./t-date";
import tRange from "./t-range";
import tSearch from "./t-search";
import tTel from "./t-tel";
import tTime from "./t-time";
import tDatetimeLocal from "./t-datetime-local";
import tMonth from "./t-month";
import tWeek from "./t-week";


export default {
    props:['formulario','tipos'],
    components:{tText, tEmail, tPassword, tNumber, tUrl, tDate, tRange, tSearch, tTel, tTime, tDatetimeLocal, tMonth, tWeek},
    methods:{
        getTipo(input){
            return this.tipos.find(tipos => input.testInput == tipos.PK_id)
        }
    }    
}


</script>
