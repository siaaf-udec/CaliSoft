<template>
  <div>
    <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Items</th>
                    <th class="text-center">Calificación</th>
                </thead>
                <tbody>
                    <tr v-for="item in items" class="text-center">
                        <td v-text="item.item"></td>
                        <td>0</td>   
                    </tr>
                </tbody>
            </table>
    </div>
             
    </div>
</template>
<script>
import TextareaInput from '../inputs/textarea-input';
export default {
    components:{TextareaInput},
  props:['items']
}
</script>

