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

                <tr v-for="person in people" class="">
                    <th scope="row">{{ person.id }}</th>

                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td>
                        <router-link :to="{name: 'person.show', params: {id: person.id}}">Show</router-link>
                    </td>
                    <td>
                        <router-link :to="{name: 'person.edit', params: {id: person.id}}">Edit</router-link>
                    </td>

                    <td>
                        <a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a>
                    </td>



                </tr>


            </tbody>
        </table>
    </div>
</template>


<script>

export default {
    name: 'IndexComponent',
    data() {
        return {
            people: null
        }
    },
    mounted() {
        this.getPeople()
    },

    methods: {
        getPeople() {
            axios.get('/api/person')
                .then(res => {
                    // console.log(res.data)
                    this.people = res.data
                })
        },
        deletePerson(id){
            axios.delete(`/api/person/${id}`)
                .then(res =>{
                    this.getPeople()
                })
        }
    },
    components: {}
}
</script>
