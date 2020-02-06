import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../components/Pages/Home"
import Papeis from "../components/Pages/Papeis"
import Projetos from "../components/Pages/Projetos"
import Usuarios from "../components/Pages/Usuarios"
import PapeisCreate from "../components/Pages/Papeis/Create"
import PapeisEdit from "../components/Pages/Papeis/Edit"

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    history: true,
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/papeis',
            component: Papeis
        },
        {
            path: '/papeis/create',
            component: PapeisCreate
        },
        {
            path: '/papeis/:id/edit',
            name: 'papeis.edit',
            component: PapeisEdit
        },
        {
            path: '/projetos',
            component: Projetos
        },
        {
            path: '/usuarios',
            component: Usuarios
        },

    ]
});

export default router;