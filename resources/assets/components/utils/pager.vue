<template>
    <ul class="pagination">
        <li :class="{'disabled': page == 1}">
            <a href="#" @click.prevent="page != 1 && $emit('change', page - 1)">
                <span class="fa fa-chevron-left"></span>
            </a>
        </li>
        <li v-for="n in lastPage" :class="{'active': page == n}">
            <a href="#" @click.prevent="$emit('change', n)" >{{ n }}</a>
        </li>
        <li :class="{'disabled': page == lastPage}">
            <a href="#" @click.prevent="page != lastPage && $emit('change', page + 1)">
                <span class="fa fa-chevron-right"></span>
            </a>
        </li>
    </ul>
</template>

<script>


export default {
    props: {
        page: {
            type: Number,
            required: true
        },
        lastPage: {
            type: Number,
            required: true
        },
        show: {
            type: Number,
            required: true
        }
    }
}
</script>

<style lang="css">
</style>
