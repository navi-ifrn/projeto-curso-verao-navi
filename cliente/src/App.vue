<template>
    <div class="page">
        <div class="flex-fill">
            <TopHeader />
            <Navbar />
            <div class="my-3 my-md-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Dashboard</h3>
                            </div>
                            <div class="container-fluid mt-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-status bg-teal"></div>
                                            <div class="card-header">
                                                <h3 class="card-title">Papéis</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-status bg-purple"></div>
                                            <div class="card-header">
                                                <h3 class="card-title">Projetos</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-status bg-green"></div>
                                            <div class="card-header">
                                                <h3 class="card-title">Usuários</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import Navbar from "./components/Layout/Navbar";
import TopHeader from "./components/Layout/TopHeader";
export default {
  name: 'app',
    components: {TopHeader, Navbar}
}
</script>

<style>
</style>
