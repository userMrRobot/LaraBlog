<template>
    <div class="w-25">
        <div class="mb-3">

            <input type="text" class="form-control" name="name" v-model="name" id="text" placeholder="name">
        </div>
        <div class="mb-3">

            <input type="number" class="form-control" name="age" v-model="age" id="text" placeholder="age">
        </div>
        <div class="mb-3">

            <input type="text" class="form-control" name="job" v-model="job" id="text" placeholder="job">
        </div>
        <div class="mb-3">

            <input @click.prevent="update()" type="text" class="btn btn-primary" value="Изменить">
        </div>

    </div>
</template>


<script>
import router from "../../router.js";

export default {
    name: 'EditComponent',

    data() {
        return {
            name: null,
            age: null,
            job: null
        }
    },

    mounted() {
        this.getPerson()
    },
    methods: {
        getPerson() {
            axios.get(`/api/person/${this.$route.params.id}`)
                .then(res => {
                    this.name = res.data.name
                    this.age = res.data.age
                    this.job = res.data.job
                })
        },

        update(){
            axios.patch(`/api/person/${this.$route.params.id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    router.push({name: 'person.show', params: {id: this.$route.params.id}})
                })
        }
    }
}

</script>
