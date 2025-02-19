<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' :'d-none'">
        <th scope="row">{{ person.id }}</th>

        <td><input type="text" v-model="name" class="form-control"></td>
        <td><input type="number" v-model="age" class="form-control"></td>
        <td><input type="text" v-model="job" class="form-control"></td>

        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-primary">Update</a></td>
    </tr>
</template>


<script>


export default {
    name: 'EditComponent',

    data() {
        return {

            name: null,
            age: null,
            job: null,
        }
    },
    props: [
        'person'
    ],
    mounted() {

    },
    methods: {
        updatePerson(id) {
            this.$parent.editPersonId = null

            axios.patch(`/api/person/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.$parent.getPerson()
                })
        },
    }
};
</script>
