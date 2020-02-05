<template>
    <div class="card">
        <div class="card-status bg-teal"></div>
        <div class="card-header">
            <h3 class="card-title">Papéis</h3>
        </div>
        <ApiTable :campos-excluidos="camposExcluidos" recurso="papeis"/>
    </div>
</template>

<script>
    import ApiTable from "../ApiTable";
    export default {
        name: "CardPapeis",
        components: {ApiTable},
        data() {
            return {
                camposExcluidos: ["id"]
            }
        }
    }
</script>

<style scoped>

</style>