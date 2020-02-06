<template>
    <div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <router-link to="/" class="nav-link" exact-active-class="active">
                                    Página inicial
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/papeis" class="nav-link" exact-active-class="active">
                                    Papéis
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/projetos" class="nav-link" exact-active-class="active">
                                    Projetos
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/usuarios" class="nav-link" exact-active-class="active">
                                    Usuários
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "Navbar"
    }
</script>

<style scoped>

</style>