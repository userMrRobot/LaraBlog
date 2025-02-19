<template>
    <div class="">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in persons">
                <ShowComponent :person="person"></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>

            </template>
            </tbody>
        </table>
    </div>
</template>


<script>

import EditComponent from "./EditComponent.vue";
import ShowComponent from "./ShowComponent.vue";

export default {
    name: 'IndexComponent',


    data() {
        return {
            persons: null,
            editPersonId: null,
            name: null,
            age: null,
            job: null,
        }
    },

    mounted() {
        this.getPerson()
    },
    methods: {

        getPerson() {
            axios.get('/api/person')
                .then(res => {
                    this.persons = res.data


                })
                .catch(error => {
                    console.log(error)
                })
        },

        updatePerson(id){
            this.editPersonId = null

            axios.patch(`/api/person/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.getPerson()
                })
        },

        deletePersonId(id){
            axios.delete(`/api/person/${id}`)
                .then(res => {

                    this.getPerson()
                })
        },


        changeEditPersonId(id, name,age,job) {
            this.editPersonId = id
            let editId = `edit_${id}`
            let fullIdName = this.$refs[editId][0]

            fullIdName.name = name
            fullIdName.age = age
            fullIdName.job = job
        },
        isEdit(id){
            return this.editPersonId === id
        }
    },
    components: {
        // Регистрируем ExampleComponent

        EditComponent,
        ShowComponent
    }
};
</script>
