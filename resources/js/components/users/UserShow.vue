<template>
    <div>
        <modal name="show-user" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <div class="modal-header">
                        <h5 class="modal-title"><strong>Datos del Doctor</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-user')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Datos del Usuario
                                </div>
                          </div>
                      </div>
                      <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Usuario</label>
                            <input type="text" class="form-control" disabled id="name" name="user.name" v-model="user.name" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Correo</label>
                            <input type="text" class="form-control" disabled id="email" name="user.email" v-model="user.email" >
                        </div>
                    </div>
                </div>
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
                            <input type="text" class="form-control" disabled id="name" name="doctor.name" v-model="doctor.name" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Apellido Paterno</label>
                            <input type="text" class="form-control"  disabled id="ape_pat" name="doctor.ape_pat" v-model="doctor.ape_pat" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" disabled id="ape_mat" name="doctor.ape_mat" v-model="doctor.ape_mat" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Telefono</label>
                            <input type="text" class="form-control" disabled id="telefono" name="doctor.telefono" v-model="doctor.telefono" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Cedula Profesional</label>
                            <input type="text" class="form-control" disabled id="cedula_profesional" name="doctor.cedula_profesional" v-model="doctor.cedula_profesional" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Universidad</label>
                            <input type="text" class="form-control" disabled id="universidad" name="doctor.universidad" v-model="doctor.universidad" >
                        </div>
                    </div>
                </div>
                    </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  @click="$modal.hide('show-user')">Cerrar</button>
                </div>
        </modal>
    </div>
</template>
<script>
    export default {
        
        data(){
            return {
                user:{
                    name: '',
                    email: '',
                },
                doctor:
                {
                    name: '',
                    ape_mat: '',
                    ape_pat: '',
                    telefono: '',
                    universidad: '',
                    cedula_profesional: '',
                    user_id: ''
                }
            }
        },
        methods: {
            beforeOpen(event)
            {
                axios.get(this.$route('doctors.show',event.params)).then((response) =>
                    {
                        this.user = response.data.user;
                        this.doctor = response.data;
                    }
                )
            },
            beforeClose()
            {
                this.user.name = '';
                this.user.email = '';
                this.doctor.name = '';
                this.doctor.ape_pat = '';
                this.doctor.ape_mat = '';
                this.doctor.telefono = '';
                this.doctor.universidad = '';
                this.doctor.cedula_profesional = '';
            }
        }
    }
</script>
