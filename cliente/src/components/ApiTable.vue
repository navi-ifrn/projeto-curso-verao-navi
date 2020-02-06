import Swal from "sweetalert2";
<template>
    <div class="table-responsive push">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th :key="index" v-for="(chave, index) in chavesCabecalho">
                        {{ traducaoCampos.hasOwnProperty(chave) ? traducaoCampos[chave] : chave }}
                    </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="item in items.data">
                    <tr :key="item.id">
                        <td :key="index" v-for="(chave, index) in chavesCabecalho">
                            {{ item[chave] }}
                        </td>
                        <td>
                            <router-link :to="{ name: `${recurso}.edit`, params: { id: item.id} }" class="btn btn-outline-warning btn-sm">
                                Editar
                            </router-link>
                            <button @click="confirmarExclusao(item.id)" class="ml-2 btn btn-outline-danger btn-sm">Excluir</button>
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
    import Swal from 'sweetalert2'
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
            },
            traducaoCampos: {
                type: Object,
                default() {
                    return {}
                }
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
            },
            deletarRegistro(id) {
                const vm = this
                fetch(`${BASE_URL}/papeis/${id}`, {
                    method: "delete",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                    .then( (response) => {
                        window.console.log(response)
                        vm.carregarDados()
                    });
            },
            confirmarExclusao(id) {
                Swal.fire({
                    title: 'Você tem certeza que deseja deletar?',
                    text: 'Uma vez deletado jamais recuperado',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#71d644',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não'
                }).then((result) => {
                    if (result.value) {
                        this.deletarRegistro(id)
                        Swal.fire('Sucesso', 'Operação realizada com sucesso', 'success')
                    } else {
                        Swal.fire('Cancelado', 'Operação cancelada com sucesso', 'error')
                    }
                })
            },
        }
    }
</script>

<style scoped>

</style>