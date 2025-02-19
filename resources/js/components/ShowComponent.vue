<template>

    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' :''">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name,person.age,person.job)"
               class="btn btn-primary">Edit</a></td>
        <td><a href="#" @click.prevent="deletePersonId(person.id)" class="btn btn-danger">Delete</a></td>

    </tr>

</template>


<script>


export default {
    name: 'ShowComponent',


    data() {
        return {

        }
    },
    props:[
      'person'
    ],

    mounted() {

    },
    methods: {


        deletePersonId(id) {
            axios.delete(`/api/person/${id}`)
                .then(res => {

                    this.$parent.getPerson()
                })
        },


        changeEditPersonId(id, name, age, job) {
            this.$parent.editPersonId = id
            let editId = `edit_${id}`
            let fullIdName = this.$parent.$refs[editId][0]

            fullIdName.name = name
            fullIdName.age = age
            fullIdName.job = job
        },

    },
    components: {}
};
</script>
