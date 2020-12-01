<template>
    <div>
        <modal name="show-date" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Registrar Cita</strong></h5>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-date')">
                <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                        Información de la cita
                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Paciente</label>
                        <input type="text" disabled class="form-control" id="patient" name="patient" v-model="date.patient_name" >
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="content">Doctor</label>
                        <input type="text" disabled class="form-control" id="doctor" name="doctor" v-model="date.doctor_name">
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Dia</label>
                        <input type="text" disabled class="form-control" id="fecha" name="fecha" v-model="date.fecha" >
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="content">Hora</label>
                        <input type="text" disabled class="form-control" id="hora" name="hora" v-model="date.hora" >
                </div>
            </div>
        </div>
            </div>        
            <div class="modal-footer">
                <button type="button" @click="$modal.hide('show-date')" class="btn btn-secondary">Cerrar</button>
            </div>
    </modal>
    </div>
</template>
<script>
    
    export default {
     
        data(){
            return {
                date:{
                    paciente_id: '',
                    doctor_id: '',
                    fecha: '',
                    hora: ''
                },
            }
        },
        methods: {
            afterDone(response){
               if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('dates.view');
                 }
            },
            beforeOpen(event)
            {
                axios.get(this.$route('dates.show', event.params)).then((response)=>
                {
                    this.date = response.data;
                });
            },
            beforeClose()
            {
                this.date.paciente_id = '';
                this.date.fecha = '';
                this.date.doctor_id = '';
                this.date.hora = '';
            }
        },
    }
</script>