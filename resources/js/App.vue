
<template>
    <div>
        <router-link :to="{name: 'person.index'}">People</router-link>
        <br>
        <router-link :to="{name: 'person.create'}">Create</router-link>
        <router-view></router-view>

    </div>


</template>

<style scoped>

</style>


<script>
//
//import CreateComponent from "./components/CreateComponent.vue";
//import IndexComponent from "./components/IndexComponent.vue";


export default {
    name: 'app',
    data() {
        return {


        }

    },

    mounted() {


    },

    methods: {


    },
    computed: {

        },
    components: {
        // Регистрируем ExampleComponent

        // CreateComponent,
        // IndexComponent,

    }
};
</script>
