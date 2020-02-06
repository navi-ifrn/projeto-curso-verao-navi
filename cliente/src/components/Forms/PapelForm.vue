<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ textosCard.titulo }}</h3>
        </div>
        <div class="ml-2 row">
            <div class="col-auto">
                <form action="">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input v-model="papel.nome" id="nome" type="text" class="form-control" />
                    </div>
                </form>
                <button @click.prevent="tratarSubmissao" class="btn btn-outline-primary">{{ textosCard.botao }}</button>
            </div>
        </div>
    </div>
</template>

<script>
    const BASE_URL = "http://localhost:8000/api"
    const MODO_CRIACAO = "criacao"
    const MODO_EDICAO = "edicao"
    export default {
        name: "PapelForm",
        props: {
            papelId: {
                type: String,
                default: null
            },
            modo: {
                type: String,
                default: MODO_CRIACAO
            }
        },
        data() {
            return {
                papel: {
                    nome: null
                }
            }
        },
        mounted() {
            if (this.modo === MODO_EDICAO) {
                this.resgatarPapel()
            }
        },
        computed: {
            textosCard() {
                return this.modo === MODO_CRIACAO ?
                    {
                        titulo: "Criação de papéis",
                        botao: "Criar"
                    } :
                    {
                        titulo: "Edição de papéis",
                        botao: "Atualizar"
                    }
            },
            tituloCard() {
                return this.modo === MODO_CRIACAO ? "Criação de papéis" : "Edição de papéis"
            },
        },
        methods: {
            tratarSubmissao() {
                if (this.modo === MODO_CRIACAO) {
                    this.criarPapel()
                } else if (this.modo === MODO_EDICAO) {
                    this.editarPapel()
                }
            },
            criarPapel() {
                fetch(`${BASE_URL}/papeis`, {
                    method: "post",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.papel)
                })
                    .then( (response) => {
                        window.console.log(response)
                    });
            },
            editarPapel() {
                fetch(`${BASE_URL}/papeis/${this.papelId}`, {
                    method: "put",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },

                    //make sure to serialize your JSON body
                    body: JSON.stringify(this.papel)
                })
                    .then( (response) => {
                        window.console.log(response)
                    });
            },
            resgatarPapel() {
                const vm = this
                fetch(`${BASE_URL}/papeis/${this.papelId}`)
                    .then(function(response) {
                        response.json()
                            .then(function (papel) {
                                vm.papel = papel
                            })
                    })
            }
        }
    }
</script>

<style scoped>

</style>