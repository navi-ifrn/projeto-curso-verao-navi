<template>
    <div class="page">
        <div class="flex-fill">
            <TopHeader />
            <Navbar />
            <div class="my-3 my-md-5">
                <div class="container-fluid">
                    <div class="row">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import Navbar from "./components/Layout/Navbar"
import TopHeader from "./components/Layout/TopHeader"

export default {
  name: 'app',
    components: {TopHeader, Navbar}
}
</script>

<style>
</style>
