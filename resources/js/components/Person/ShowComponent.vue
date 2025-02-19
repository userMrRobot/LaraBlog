<template>
    <div v-if="person" class="">
        <div class=""> name: {{ this.person.name }}</div>
        <div class=""> age: {{ this.person.age }}</div>
        <div class=""> job: {{ this.person.job }}</div>
        <router-link :to="{name: 'person.edit', params: {id: this.person.id}}">Edit</router-link>

    </div>
</template>


<script>
export default {
    name: 'ShowComponent',

    data() {
        return {
           person : null
        }
    },

    mounted() {

        this.getPerson()
    },
    methods:{
        getPerson(){
            axios.get(`/api/person/${this.$route.params.id}`)
                .then(res => {

                    this.person = res.data

                })
        }
    }
}

</script>
