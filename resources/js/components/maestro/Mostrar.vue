<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearMaestro"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="maestro in maestros" :key="maestro.id">
                                    <td>{{ maestro.id }}</td>
                                    <td>{{ maestro.nombre }}</td>
                                    <td>{{ maestro.descripcion }}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarMaestro",params:{id:maestro.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarMaestro(maestro.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"maestros",
    data(){
        return {
            maestros:[]
        }
    },
    mounted(){
        this.mostrarMaestros()
    },
    methods:{
        async mostrarMaestros(){
            await this.axios.get('/api/maestro').then(response=>{
                this.maestros = response.data
            }).catch(error=>{
                console.log(error)
                this.maestros = []
            })
        },
        borrarMaestro(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/maestro/${id}`).then(response=>{
                    this.mostrarMaestros()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>