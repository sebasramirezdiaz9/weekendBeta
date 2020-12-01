<template>
    <div>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-rounded m-1" @click="$modal.show('create-users')">
                Agregar Empleado
            </button>
        </div>
        <modal name="create-users" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('employees.store')" method="post" id="createUser" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="{user, employee}" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Crear Empleado</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('create-users')">
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
                            <input type="text" class="form-control" id="name" name="user.name" v-model="user.name" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Correo</label>
                            <input type="text" class="form-control" id="email" name="user.email" v-model="user.email" >
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
                            <input type="text" class="form-control" id="nombre" name="employee.nombre" v-model="employee.nombre" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ape_pat" name="employee.ape_pat" v-model="employee.ape_pat" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" id="ape_mat" name="employee.ape_mat" v-model="employee.ape_mat" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Télefono</label>
                            <input type="text" class="form-control" id="telefono" name="employee.telefono" v-model="employee.telefono" >
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
                },
            }
        },
        methods: {
             afterDone(response){
               if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('users.view');
                 }
            },
            beforeOpen()
            {
                this.user.name = '';
                this.user.email = '';
                this.employee.name = '';
                this.employee.ape_pat = '';
                this.employee.ape_mat = '';
                this.employee.telefono = '';
            },
        }
    }
</script>
