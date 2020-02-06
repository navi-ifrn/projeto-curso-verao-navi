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
            name: 'home',
            component: Home
        },
        {
            path: '/papeis',
            name: 'papeis',
            component: Papeis
        },
        {
            path: '/papeis/create',
            name: 'papeis.create',
            component: PapeisCreate
        },
        {
            path: '/papeis/:id/edit',
            name: 'papeis.edit',
            component: PapeisEdit
        },
        {
            path: '/projetos',
            name: 'projetos',
            component: Projetos
        },
        {
            path: '/projetos/:id/edit',
            name: 'projetos.edit',
            component: Projetos
        },
        {
            path: '/usuarios',
            name: 'usuarios',
            component: Usuarios
        },
        {
            path: '/usuarios/:id/edit',
            name: 'usuarios.edit',
            component: Usuarios
        },

    ]
});

export default router;