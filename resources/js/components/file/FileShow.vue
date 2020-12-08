<template>
    <div>
        <modal name="show-file" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Registrar Expediente</strong></h5>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-file')">
                <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                               Informacion del Expediente
                         </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Paciente</label>
                              <input type="text" disabled class="form-control" id="patient" name="patient" v-model="file.patient_name" >
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="number" step="0.01"  disabled class="form-control" id="peso" name="peso" v-model="file.peso" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="altura">Altura</label>
                            <input type="number"  step="0.01" disabled class="form-control" id="altura" name="altura" v-model="file.altura">
                        </div>
                    </div>
  
                 </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alergias">Alergias</label>
                          <textarea class="form-control" id="alergias" disabled name="alergias" v-model="file.alergias">Alergias</textarea>
                        </div>
                    </div>
                 </div>
                

           
            </div>        
            <div class="modal-footer">
                <button type="button" @click="$modal.hide('show-file')" class="btn btn-secondary">Cerrar</button>
            </div>
    </modal>
    </div>
</template>
<script>
    
    export default {
     
        data(){
            return {
               file:{
                    paciente_id: '',
                    peso: '',
                    altura: '',
                    alergias: ''
                }
            }
        },
        methods: {
            afterDone(response){
               if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('file.view');
                 }
            },
            beforeOpen(event)
            {
                axios.get(this.$route('file.show', event.params)).then((response)=>
                {
                    this.file = response.data;
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
    }
</script>