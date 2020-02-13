<template>
    <div class="container-fluid">
        <ApiCard recurso="projetos"></ApiCard>
    </div>
</template>

<script>
    import ApiCard from "../ApiCard";
    export default {
        name: "Home",
        components: {ApiCard}
    }
</script>

<style scoped>

</style>