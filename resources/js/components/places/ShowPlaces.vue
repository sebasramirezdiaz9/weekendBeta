<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-6">
                 <label for="state">Elige tu Punto de Partida</label>
               <gmap-autocomplete @place_changed="updateCenter($event)" class="form-control"/>
            </div>
            <div class="col-md-6">
                 <label for="category">Tipo de lugar</label>
                <v-select v-model="category" :disabled="!state" @input="changeCategory(category.label)" :options="categories" name="paciente_id"></v-select>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-xs-12">
                <GmapMap
                disabled
                :center="position"
                :zoom="12"
                :draggable="false"
                style="width: 100%; height: 500px"
                >
                <GmapMarker
                    
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.location"
                    :clickable="true"
                    :draggable="false"
                    :icon= m.icon
                    :name = m.name
                    @click="getPlaceData(m.place_id)"
                />
                </GmapMap>
            </div>
        </div>
                        <hr>
                        <template v-if="place.name != ''">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-light mb-3" style="width: 100%; height: 200px;">
                                    <div class="card-header text-info"><h3>{{place.name}}</h3> </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h4 class="card-title">Información del lugar</h4>
                                                    <p class="card-text text-justify"> Esta lugar se encuentra en: {{place.vicinity}} y tiene una calificación de:
                                                     <star-rating name="rating" :read-only="true" v-model="place.rating"></star-rating>
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" @click="addFavorite" class="btn btn-danger"><i class="fas fa-heart"></i> Agregar a Favoritos</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        </template>
    </div>
</template>
<script>
    import Swal from 'sweetalert2';
    export default {
        data(){
            return {
                place: {name:''},
                category: 0,
                categories:[{
                    label: 'bar',code:1
                },{
                    label: 'cafe',code:2
                },{
                    label: 'university',code:3
                },{
                    label: 'gym',code:4
                },{
                    label: 'hospital',code:5
                },{
                    label: 'restaurant',code:6
                }],
                state: 0,
                markers: [],
                position: {lat:21.8852562, lng:-102.2915677}
            }
        },
        methods: {
             updateCenter(place) {
                    delete(place.utc_offset);
                    this.$set(this.position, 'lat', place.geometry.location.lat());
                    this.$set(this.position, 'lng', place.geometry.location.lng());
                    this.category = 0;
                    this.state = 1;
            },
            addFavorite()
            {
                axios.post(this.$route('add.favorite_places'),{place: this.place}).then(
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Lugar Añadido a favoritos',
                    showConfirmButton: false,
                    timer: 1500
                    })
                )
            },
            getPlaceData(place_id)
            {
                let index = this.markers.findIndex((element) => element.place_id === place_id);
                this.place = this.markers[index];
                console.log(index);
            },
            changeCategory(category)
            {
                axios.get(this.$route('get.places',{lat:this.position.lat, lng:this.position.lng ,category:category}))
                .then((response)=>{
                    this.markers = response.data;
                });
            }
        } 
    }
</script>
<style lang="scss">
     .vue-star-rating-rating-text
    {
        visibility: hidden;
    }
    .vue-star-rating[data-v-fde73a0c] {
        display: block !important;
        align-items: center;
    }
    .vue-star-rating-star{
        width: 20px !important;
        height: 20px !important;
    }
</style>