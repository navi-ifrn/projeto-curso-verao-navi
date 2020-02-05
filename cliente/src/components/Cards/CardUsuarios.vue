<template>
    <div class="card">
        <div class="card-status bg-green"></div>
        <div class="card-header">
            <h3 class="card-title">Usuários</h3>
        </div>
        <ApiTable :campos-excluidos="camposExcluidos" recurso="usuarios"/>
    </div>
</template>

<script>
    import ApiTable from "../ApiTable";
    export default {
        name: "CardUsuarios",
        components: {ApiTable},
        data() {
            return {
                camposExcluidos: ["email_verified_at", "updated_at"]
            }
        }
    }
</script>

<style scoped>

</style>