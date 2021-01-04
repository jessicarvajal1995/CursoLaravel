<template>
    <div class="row">
        <spinner v-show="loading"></spinner>
        <div class="col-sm" :key="pokemon.id" v-for="pokemon in pokemons"> <!--Iterando en vue-->
            <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                <img class="card-img-top rounded-circle mx-auto d-block igm" v-bind:src="pokemon.picture" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{pokemon.name}}</h5>
                    <p class="card-text">{{pokemon.description}}</p>
                    <a href="/trainers" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //importar el event-bus.js
    import EventBus from '../../event-bus';
    export default{
        data(){
            return {
                //retorna una coleccion de pokemones
                pokemons: [],
                loading: true
            }
        },
        //componente que esccucha el evento, se ejecuta cuando se ha creado el pokemon // $on es escuchar //$emit es transmitir
        created(){
            EventBus.$on('pokemon-added', data => {
                //push() es un metodo que ayuda a agg un componente en un array
                this.pokemons.push(data)
            })
        },
        mounted(){ 
            //axios.get para obtener informacion. 
            //lo cual me dara una respuesta que se asigna a los pokemones
            // luego lo igualamos al response que nos da laravel y accedemos a la data.  
            axios
                .get('http://127.0.0.1:8000/pokemons')
                .then((res) => {
                    this.pokemons = res.data
                    this.loading = false
                })
        }
    }
</script>

<style>
    .img{
        Height: 100px; 
        Width: 100px; 
        background-color: #EFEFEF; 
        margin: 20px;
    }
</style>
