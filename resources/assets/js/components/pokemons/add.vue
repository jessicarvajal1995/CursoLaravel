<template>
<div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Pokemon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--Prevenir que el formulario se envie, y se mandara a un metodo dentro del script en vue-->
      	<form @submit.prevent="savePokemon">
	        <div class="form-group">
			    <label>Pokemon</label>
			    <input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name">
		  	</div>
             <div class="form-group">
			    <label>Description</label>
			    <input type="text" class="form-control" placeholder="Ingresa la descripcion del pokemon" v-model="description">
		  	</div>
		  	<div class="form-group">
			    <label>Picture</label>
			    <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Save</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
//importar el event-bus.js
import EventBus from '../../event-bus';
export default {
    data(){
        return {
            name: null,
            description: null,
            picture: null
        }
    },
    methods: {
        savePokemon: function(){
            //variable que me permite obtener mi ruta actual
            let currentRoute = window.location.pathname
            console.log(currentRoute)
            //logica necesaria para enviar el request al backend
            /* axios.post('http://127.0.0.1:8000/pokemons',{
                name: this.name,
                description: this.description,
                picture: this.picture
            })
            .then(function(res){
                console.log(res)
                $('#addPokemon').modal('hide')
                EventBus.$emit('pokemon-added', res.data.pokemon)
            })
            //cachar todos los errores al momento de hacer la peticion
            .catch(function(err){
                console.log(err)
            }); */
            
            /* Para comprobar que es lo que se esta enviando por consola Js.
            console.log(this.name)
            console.log(this.description)
            console.log(this.picture)
            */
        }
    }
}
</script>

<style>

</style>