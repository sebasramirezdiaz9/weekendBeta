<template>
    <div>
        <modal name="show-employee" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <div class="modal-header">
                        <h5 class="modal-title"><strong>Datos del Empleado</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-employee')">
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
                            <input type="text" class="form-control" disabled id="name" name="employee.nombre" v-model="employee.nombre" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Apellido Paterno</label>
                            <input type="text" class="form-control"  disabled id="ape_pat" name="employee.ape_pat" v-model="employee.ape_pat" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" disabled id="ape_mat" name="employee.ape_mat" v-model="employee.ape_mat" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Telefono</label>
                            <input type="text" class="form-control" disabled id="telefono" name="employee.telefono" v-model="employee.telefono" >
                        </div>
                    </div>
                </div>
                    </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  @click="$modal.hide('show-employee')">Cerrar</button>
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
                employee:
                {
                    name: '',
                    ape_mat: '',
                    ape_pat: '',
                    telefono: '',
                    user_id: ''
                }
            }
        },
        methods: {
            beforeOpen(event)
            {
                axios.get(this.$route('employees.show',event.params)).then((response) =>
                    {
                        this.user = response.data.user;
                        this.employee = response.data;
                    }
                )
            },
            beforeClose()
            {
                this.user.name = '';
                this.user.email = '';
                this.employee.name = '';
                this.employee.ape_pat = '';
                this.employee.ape_mat = '';
                this.employee.telefono = '';
            }
        }
    }
</script>
