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
                                    <div class="col-12">
                                        <CardPapeis />
                                    </div>
                                    <div class="col-12">
                                        <CardProjetos />
                                    </div>
                                    <div class="col-12">
                                        <CardUsuarios />
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


import Navbar from "./components/Layout/Navbar"
import TopHeader from "./components/Layout/TopHeader"
import CardPapeis from "./components/Cards/CardPapeis"
import CardProjetos from "./components/Cards/CardProjetos";
import CardUsuarios from "./components/Cards/CardUsuarios";

export default {
  name: 'app',
    components: {CardUsuarios, CardProjetos, CardPapeis, TopHeader, Navbar}
}
</script>

<style>
</style>
