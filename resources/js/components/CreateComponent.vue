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

            <input @click.prevent="addPerson" type="text" class="btn btn-primary" value="Добавить">
        </div>

    </div>
</template>


<script>


export default {
    name: 'CreateComponent',

    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },
    mounted() {

    },
    methods: {
        addPerson() {
            axios.post('/api/person', {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.name = null
                    this.age = null
                    this.job = null
                    this.$parent.$refs.index.getPerson()
                })
        }
    }
};
</script>
