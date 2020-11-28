<template>
    <div>
        <modal name="edit-user" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('doctors.update',id)" method="put" id="createUser" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="{user, doctor}" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Editar Usuario</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('edit-user')">
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
                            <input type="text" class="form-control" id="email" disabled name="user.email" v-model="user.email" >
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
                            <input type="text" class="form-control" id="name" name="doctor.name" v-model="doctor.name" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ape_pat" name="doctor.ape_pat" v-model="doctor.ape_pat" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" id="ape_mat" name="doctor.ape_mat" v-model="doctor.ape_mat" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="doctor.telefono" v-model="doctor.telefono" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Cedula Profesional</label>
                            <input type="text" class="form-control" id="cedula_profesional" name="doctor.cedula_profesional" v-model="doctor.cedula_profesional" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Universidad</label>
                            <input type="text" class="form-control" id="universidad" name="doctor.universidad" v-model="doctor.universidad" >
                        </div>
                    </div>
                </div>
                    </div>        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
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
                doctor:
                {
                    name: '',
                    ape_mat: '',
                    ape_pat: '',
                    telefono: '',
                    universidad: '',
                    cedula_profesional: '',
                    user_id: ''
                },
                id: 0
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
            beforeOpen(event)
            {
                console.log(event);
                this.id = event.params;
                axios.get(this.$route('doctors.show',event.params)).then((response) =>
                    {
                        this.user = response.data.user;
                        this.doctor = response.data;
                    }
                )
            },
        }
    }
</script>
