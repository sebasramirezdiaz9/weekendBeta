<template>
    <div>
        <modal name="edit-file" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <alv-form :action="route('file.update',id)" method="put" id="fileUser" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="file" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Registrar Expediente</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('edit-file')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Expediente
                                </div>
                          </div>
                      </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Paciente</label>
                             <v-select v-model="patient"  :options="patients.map(i=>({ label:i.name + ' ' +i.ape_pat, code:i.id }))" name="paciente_id"></v-select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="number" step="0.01"  class="form-control" id="peso" name="peso" v-model="file.peso" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="altura">Altura</label>
                            <input type="number"  step="0.01" class="form-control" id="altura" name="altura" v-model="file.altura">
                        </div>
                    </div>
  
                 </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alergias">Alergias</label>
                          <textarea class="form-control" id="alergias" name="alergias" v-model="file.alergias">Alergias</textarea>
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
                 file:{
                    paciente_id: '',
                    peso: '',
                    altura: '',
                    alergias: ''
                },
                patients: [],
                patient: 0,
               
            }
        },
        created()
        {
             this.getPatients();
         
        },
        methods: {
            
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
                    window.location = this.route('file.view');
                 }
            },
            beforeOpen(event)
            {
                this.id = event.params;
                 axios.get(this.$route('file.show', event.params)).then((response)=>
                {
                    this.file = response.data;
                    this.patient = {label: response.data.patient_name, code: response.data.patient_id};
                });
            },
            beforeClose()
            {
                
                this.patient = 0,
                this.file.paciente_id = '';
                this.file.altura = '';
                this.file.peso = '';
                this.file.alergias = '';
            }
        },
        watch:{
            patient()
            {
                if(this.patient != null)
                {
                    this.file.paciente_id = this.patient.code;
                }
            }
        }
    }
</script>