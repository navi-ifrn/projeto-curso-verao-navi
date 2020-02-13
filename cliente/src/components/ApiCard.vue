<template>
    <div class="row">
        <template v-for="item in items.data">
            <div :key="item.id" class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            {{ item.titulo }}
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'
    const BASE_URL = "http://localhost:8000/api"
    export default {
        name: "ApiCard",
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