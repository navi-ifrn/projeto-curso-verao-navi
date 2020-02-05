<template>

    <div class="table-responsive push">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th :key="index" v-for="(chave, index) in chavesCabecalho">
                        {{ chave }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <template v-for="item in items.data">
                    <tr :key="item.id">
                        <td :key="index" v-for="(chave, index) in chavesCabecalho">
                            {{ item[chave] }}
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li :key="i" v-for="i in items.last_page" class="page-item" :class="{ active: i === paginaAtual}">
                    <a href="javascript:void(0);" class="page-link" @click="atribuirPaginaAtual(i)">
                        {{ i }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    const BASE_URL = "http://localhost:8000/api"
    export default {
        name: "ApiTable",
        props: {
            camposExcluidos: {
                type: Array,
                default() {
                    return []
                }
            },
            recurso: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                items: {
                    data: []
                },
                paginaAtual: 1
            }
        },
        mounted() {
            this.carregarDados()
        },
        computed: {
            chavesCabecalho() {
                if (this.items.data.length > 0) {
                    const vm = this
                    return Object.keys(this.items.data[0]).filter(function (chave) {
                        return vm.camposExcluidos.indexOf(chave) === -1
                    })
                }

                return []
            }
        },
        methods: {
            carregarDados() {
                const vm = this
                fetch(`${BASE_URL}/${this.recurso}?page=${this.paginaAtual}`)
                    .then(function(response) {
                        response.json()
                            .then(function (items) {
                                vm.items = items
                            })
                    })
            },
            atribuirPaginaAtual(pagina) {
                this.paginaAtual = pagina

                this.carregarDados()
            }
        }
    }
</script>

<style scoped>

</style>