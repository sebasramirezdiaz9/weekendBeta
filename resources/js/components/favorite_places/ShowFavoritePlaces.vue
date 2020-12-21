<template>
    <div>
        <div class="row mt-5">
            <div class="col-md-12 col-xs-12">
                <GmapMap
                disabled
                :center="position"
                :zoom="6"
                :draggable="false"
                style="width: 100%; height: 500px"
                >
                <GmapMarker
                    
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    :clickable="true"
                    :draggable="false"
                    :icon= m.icon
                    :name = m.name
                />
                </GmapMap>
            </div>
        </div>
    </div>
</template>
<script>
    import Swal from 'sweetalert2';
    export default {
        data(){
            return {
                place: {name:''},
                category: 0,
                state: 0,
                markers: [],
                position: {lat:21.8852562, lng:-102.2915677}
            }
        },
        created()
        {
            this.getPlaces();
        },
        methods: {
            getPlaces()
            {
                axios.get(this.$route('get.favorite.places')).then((response) =>{
                    response.data.forEach(element => {
                        this.markers.push({id: element.id, position:{lat:parseFloat(element.lat), lng:parseFloat(element.lng)}, icon:{url:'http://maps.google.com/mapfiles/ms/icons/green-dot.png'}});
                    });
                });
            }
        } 
    }
</script>
<style lang="scss">
     .alert-warning
    {
        background: orange;
    }
</style>