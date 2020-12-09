<template>
   <div>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-rounded m-1" @click="$modal.show('create-prescriptions')">
                Crear Receta Médica
            </button>
        </div>
        <modal name="create-prescriptions" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('prescriptions.store')" method="post" id="createPatients" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="prescription" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Crear Receta</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('create-prescriptions')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                  <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Paciente
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
                </div><hr>
                <div v-for="(medicine,i) in prescription.medicines" :key="i">
                     <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Medicamento</label>
                             <v-select
                                v-model="medicament[i]"
                                :name="'prescription.' + i + '.medicamento_id'" id="medicamento_id"
                                 @input="onChangeMedicine(medicament[i],i)"
                                 :options="medicines.map(i=>({ label:i.activo + ' ' +i.presentacion, code:i.id }))"></v-select>
                        </div>
                    </div><br>
                    <div class="col-md-3">
                        <div class="form-group">
                                <button @click="addMedicine()" title="Agregar tarea" id="button" type="button" class="btn btn-outline-success btn-icon mt-4">
                                    <i class="fas fa-plus"></i>
                                </button>
                        </div>
                    
                    </div><br>
                     <div class="col-md-3">
                       <div class="form-group">
                                <button v-if="prescription.medicines.length > 1" @click="removeMedicine(i)" title="Agregar tarea" id="button" type="button" class="btn btn-outline-danger btn-icon mt-4">
                                    <i class="fas fa-trash"></i>
                                </button>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Instrucciones</label>
                            <textarea  :name="'prescription.' + i + '.instructions'" v-model="prescription.medicines[i].instructions" class="form-control" id=""></textarea>
                        </div>
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
                medicines: [],
                medicament: [],
                prescription:
                {
                   paciente_id: '',
                   medicines: [{
                       medicine_id:'',
                       instructions: ''

                   }]
                },
                patient: 0,
                patients: []
            }
        },
        created()
        {
            this.getPatients();
            this.getMedicines();
        },
        methods: {
             afterDone(response){
               if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('prescriptions.view');
                 }
            },
            addMedicine()
            {
                this.prescription.medicines.push({medicine_id: '', instructions: ''});
            },
            removeMedicine(index)
            {
                this.prescription.medicines.splice(index,1);
            },
            onChangeMedicine(medicine, index){
                this.prescription.medicines[index].medicine_id = medicine.code;
            },
            beforeOpen()
            {
                this.prescription.paciente_id = '';
                this.prescription.medicines = [{
                       medicine_id:'',
                       instructions: ''
                   }];
            },
             getPatients()
            {
                axios.get(this.$route('patients.all')).then((response) =>
                {
                    this.patients = response.data;
                });
            },
            getMedicines()
            {
                axios.get(this.$route('medicines.all')).then((response) =>
                {
                    this.medicines = response.data;
                });
            },
        },
          watch:{
            patient()
            {
                if(this.patient != null)
                {
                    this.prescription.paciente_id = this.patient.code;
                }
            },
        }
    }
</script>