<template>
    <div class="col-12">
        <PapelForm :papel-id="papelId" modo="edicao" />
    </div>
</template>

<script>
    import PapelForm from "../../Forms/PapelForm";
    export default {
        name: "Edit",
        components: {PapelForm},
        computed: {
            papelId() {
                return this.$route.params.id
            }
        }
    }
</script>

<style scoped>

</style>