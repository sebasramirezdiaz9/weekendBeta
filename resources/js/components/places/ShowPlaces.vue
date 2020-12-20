<template>
    <div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <GmapMap
                disabled
                :center="{lat:23.6345005, lng:-102.5527878}"
                :zoom="5"
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
                    @click="getDataOffice(m.id)"
                />
                </GmapMap>
            </div>
        </div>
                        <hr>
                        <!--template v-if="office.name != ''">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-light mb-3" style="width: 100%; height: 200px;">
                                    <div class="card-header text-info"><h3>{{office.name}}</h3> </div>
                                        <div class="card-body">
                                            <h4 class="card-title">Información de la oficina</h4>
                                                <p class="card-text text-justify"> Esta oficina pertenece a la fundación: {{office.foundation_name}}, esta guardada bajo el nombre de
                                                {{office.name}} y fue registrada el dia {{office.human_date_created}} 
                                                </p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </template-->
    </div>
</template>
<script>
    export default {
        data(){
            return {
                
            }
        },
        methods: {
            
        }
    }
</script>
