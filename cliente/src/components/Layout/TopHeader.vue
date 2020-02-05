<template>
    <div class="header py-4">
        <div class="container">
            <div class="d-flex">
                <a class="header-brand" href="#">
                    <img :src="logo" class="header-brand-img" alt="Portal">
                </a>
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <span :style="avatarStyle" class="avatar mr-3 align-self-center" />
                            <span class="ml-2 d-none d-lg-block">
                              <span class="text-default">Pesquisador NAVI</span>
                              <small class="text-muted d-block mt-1">Administrador</small>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-user"></i> Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-settings"></i> Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <span class="float-right"><span class="badge badge-primary">6</span></span>
                                <i class="dropdown-icon fe fe-mail"></i> Inbox
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-send"></i> Message
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon fe fe-log-out"></i> Sign out
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                    <span class="header-toggler-icon"></span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import LogoNavi from '../../assets/logo-navi.svg';
    import LogoNaviSemTexto from '../../assets/logo-navi-sem-texto.png';


    export default {
        name: "TopHeader",
        data() {
            return {
                logo: LogoNavi
            }
        },
        computed: {
            avatarStyle() {
                return { backgroundImage: `url(${LogoNaviSemTexto})` }
            }
        }
    }
</script>

<style scoped>

</style>