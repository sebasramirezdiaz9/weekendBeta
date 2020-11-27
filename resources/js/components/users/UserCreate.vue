<template>
    <div>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-rounded m-1" @click="$modal.show('create-users')">
                Agregar Usuario
            </button>
        </div>
        <modal name="create-users" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('users.store')" method="post" id="createUser" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="user" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Crear Usuario</strong></h5>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="$modal.hide('create-users')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" v-model="user.name" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Correo</label>
                            <input type="text" class="form-control" id="email" name="email" v-model="user.email" >
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
                    name:'',
                    email:'',
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
            dropAllErrors() {
                let current_errors = document.getElementsByClassName('alv-error');
                while (current_errors[0]) {
                    current_errors[0].parentNode.removeChild(current_errors[0]);
                }
            },
            beforeOpen()
            {
                this.user.name = '';
                this.user.email = '';
            },
        }
    }
</script>
