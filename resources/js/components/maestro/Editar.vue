<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Maestro</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" class="form-control" v-model="maestro.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">

                                <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea2" v-model="maestro.descripcion" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">descripcion</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"editar-maestro",
    data(){
        return {
            maestro:{
                nombre:"",
                descripcion:"",
            }
        }
    },
    mounted(){
        this.mostrarMaestro()
    },
    methods:{
        async mostrarMaestro(){
            await this.axios.get(`/api/maestro/${this.$route.params.id}`).then(response=>{
                const { nombre, descripcion } = response.data
                this.maestro.nombre = nombre
                this.maestro.descripcion = descripcion
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/maestro/${this.$route.params.id}`,this.maestro).then(response=>{
                this.$router.push({name:"mostrarMaestros"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>