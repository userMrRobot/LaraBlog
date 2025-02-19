

import { createRouter, createWebHistory } from 'vue-router';


import IndexComponent from "./components/Person/IndexComponent.vue";
import EditComponent from "./components/Person/EditComponent.vue";
import ShowComponent from "./components/Person/ShowComponent.vue";
import CreateComponent from "./components/Person/CreateComponent.vue";


const routes = [
    {
        path: '/', component: () => import('./components/Person/IndexComponent.vue'),
        name: 'person.index',

    },{
        path: '/create', component: () => import('./components/Person/CreateComponent.vue'),
        name: 'person.create',

    },
    {
        path: '/:id/edit', component: () => import('./components/Person/EditComponent.vue'),
        name: 'person.edit',

    },
    {
        path: '/:id', component: () => import('./components/Person/ShowComponent.vue'),
        name: 'person.show',

    },


];

const router = createRouter({
    // обязательно пиши с учетом префикса! у меня префикс vue
    history: createWebHistory('/api/vue/person/'),
    routes
});

export default router;
