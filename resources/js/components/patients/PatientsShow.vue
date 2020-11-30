<template>
    <div>
        <modal name="show-patient" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <div class="modal-header">
                        <h5 class="modal-title"><strong>Datos del Paciente</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-patient')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Datos del Paciente
                                </div>
                          </div>
                      </div>
                       <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" disabled id="name" name="name" v-model="patient.name" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Apellido Paterno</label>
                            <input type="text" class="form-control"  disabled id="ape_pat" name="ape_pat" v-model="patient.ape_pat" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" disabled id="ape_mat" name="ape_mat" v-model="patient.ape_mat" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Telefono</label>
                            <input type="text" class="form-control" disabled id="telefono" name="telefono" v-model="patient.telefono" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Fecha de Naciemiento</label>
                            <input type="date" class="form-control" disabled id="ape_pat" name="fecha_nacimiento" v-model="patient.fecha_nacimiento" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Genero</label>
                            <select  class="form-control" id="fecha_nacimiento" disabled name="genero" v-model="patient.genero" >
                                <option value="mujer">Femenino</option>
                                <option value="hombre">Masculino</option>
                            </select>
                        </div>
                    </div>
                </div>
                    </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  @click="$modal.hide('show-patient')">Cerrar</button>
                </div>
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
                    fecha_nacimiento: '',
                    genero: ''
                   
                }
            }
        },
        methods: {
            beforeOpen(event)
            {
                axios.get(this.$route('patients.show',event.params)).then((response) =>
                    {
                        
                        this.patient = response.data;
                    }
                )
            },
            beforeClose()
            {
                this.patient.name = '';
                this.patient.ape_pat = '';
                this.patient.ape_mat = '';
                this.patient.telefono = '';
                this.patient.fecha_nacimiento= '';
                this.patient.genero= '';
            }
        }
    }
</script>