<template>
    <div>
        <modal name="edit-date" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <alv-form :action="route('dates.update',id)" method="put" id="createUser" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="date" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Registrar Cita</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('edit-date')">
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
                             <v-select v-model="patient"  :options="patients.map(i=>({ label:i.name + ' ' +i.ape_pat, code:i.id }))" name="paciente_id"></v-select>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Doctor</label>
                             <v-select v-model="doctor"  :options="doctors.map(i=>({ label:i.name + ' ' +i.ape_pat, code:i.id }))" name="doctor_id"></v-select>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Dia</label>
                              <flat-pickr v-model="date.fecha" :config="config" name="fecha" class="form-control"></flat-pickr>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Hora</label>
                             <flat-pickr v-model="date.hora" :config="config2" name="hora" class="form-control"></flat-pickr>
                        </div>
                    </div>
                </div>
                    </div>        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </alv-form>
            </modal>
    </div>
</template>
<script>
    
    export default {
     
        data(){
            return {
                id: 0,
                date:{
                    paciente_id: '',
                    doctor_id: '',
                    fecha: '',
                    hora: ''
                },
                doctors: [],
                patients: [],
                patient: 0,
                doctor: 0,
                config2:{
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                },
                config:{
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",
                }
            }
        },
        created()
        {
            this.getDoctor();
            this.getPatients();
        },
        methods: {
            getDoctor()
            {
                axios.get(this.$route('doctors.all')).then((response) =>
                {
                    this.doctors = response.data;
                });
            },
            getPatients()
            {
                axios.get(this.$route('patients.all')).then((response) =>
                {
                    this.patients = response.data;
                });
            },
            afterDone(response){
               if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('dates.view');
                 }
            },
            beforeOpen(event)
            {
                this.id = event.params;
                 axios.get(this.$route('dates.show', event.params)).then((response)=>
                {
                    this.date = response.data;
                    this.patient = {label: response.data.patient_name, code: response.data.patient_id};
                    this.doctor = {label: response.data.doctor_name, code: response.data.doctor_id}
                });
            },
            beforeClose()
            {
                
                this.patient = 0,
                this.doctor = 0;
                this.date.paciente_id = '';
                this.date.fecha = '';
                this.date.doctor_id = '';
                this.date.hora = '';
            }
        },
        watch:{
            patient()
            {
                if(this.patient != null)
                {
                    this.date.paciente_id = this.patient.code;
                }
            },
            doctor()
            {
                if(this.doctor != null)
                {
                     this.date.doctor_id = this.doctor.code;
                }
            }
        }
    }
</script>