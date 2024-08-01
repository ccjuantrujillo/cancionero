<template>
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
          <th scope="col">Codigo</th>
          <th scope="col">Nombres</th>
          <th scope="col">Solicitante</th>
          <th scope="col">Correo</th>
          <th scope="col">Celular</th>
          <th scope="col" colspan="2" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr v-for="(contacto,indice) of contactos" :key="contacto.id_contacto" class="text-center">
            <th scope="row">{{contacto.id_contacto}}</th>
            <td>{{contacto.nombre_contacto}}</td>
            <td>{{contacto.SOLIC_Nombre}}</td>
            <td>{{contacto.correo_contacto}}</td>
            <td>{{contacto.celular_contacto}}</td>
            <td>
                <button class="btn btn-info" @click="btnEditar(contacto.id_contacto)">Editar</button>
            </td>
            <td>
                <button class="btn btn-danger" v-on:submit.prevent="btnBorrar(indice)" @click="btnBorrar(contacto, indice) in contactos">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                contactos: [
                    {
                        id_contacto : 1,
                        nombre_contacto : 'Juan Perez',
                        SOLIC_Nombre : 'Jose Sanchez',
                        correo_contacto : '11',
                        celular_contacto : '45445'
                    }
                ],
                saveData:null
            }
        },
        created(){
            this.listar();
        },
        methods: {
            listar(){
                var url = '/contacto/list';
                axios.get(url).then(response=>{
                    this.contactos = response.data;
                });
            },
            async btnBorrar(contacto,indice){
                var url = '/contacto/'+contacto.id_contacto;
                //alert(url);
                await this.$unloadScript("https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY");
                /*axios.delete(url).then(response=>{
                    if (response.data.status !== undefined && response.data.status === 'ERROR') {
                        Swal.fire({ title: '', text: '"' + response.data.message + '"', icon: 'error', confirmButtonText: 'Aceptar', allowOutsideClick: false });
                        return;
                    }
                    Swal.fire({ title: '', text: '"' + response.data.message + '"', icon: 'success', confirmButtonText: 'Aceptar', allowOutsideClick: false })

                    this.listar();
                });*/
            },
            async btnEditar(id){
                await this.$loadScript("https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY");
            },
            btnNuevo(){
                alert('Chau');
            }    

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
