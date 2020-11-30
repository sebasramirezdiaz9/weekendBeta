<template>
   <div>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-rounded m-1" @click="$modal.show('create-patients')">
                Registrar Paciente
            </button>
        </div>
        <modal name="create-patients" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('patients.store')" method="post" id="createPatients" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="patient" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Registrar Paciente</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('create-patients')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                      
                  <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Datos Personales
                                </div>
                          </div>
                      </div>
                       <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" v-model="patient.name" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ape_pat" name="ape_pat" v-model="patient.ape_pat" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" id="ape_mat" name="ape_mat" v-model="patient.ape_mat" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" v-model="patient.telefono" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Fecha de Naciemiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" v-model="patient.fecha_nacimiento" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Género</label>
                            <select  class="form-control" id="fecha_nacimiento" name="genero" v-model="patient.genero" >
                                <option value="mujer">Femenino</option>
                                <option value="hombre">Masculino</option>
                            </select>
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
                
                patient:
                {
                    name: '',
                    ape_mat: '',
                    ape_pat: '',
                    telefono: '',
                    universidad: '',
                    fecha_nacimiento:'',
                    genero: ''
                }
            }
        },
        methods: {
             afterDone(response){
               if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('patients.view');
                 }
            },
            beforeOpen()
            {
               
                this.patient.name = '';
                this.patient.ape_pat = '';
                this.patient.ape_mat = '';
                this.patient.telefono = '';
                this.patient.fecha_nacimiento = '';
                this.patient.genero = '';
            },
        }
    }
</script>