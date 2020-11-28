<template>
    <div>
        <modal name="edit-user" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('users.update',id)" method="put" id="createUser" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="user" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Editar Usuario</strong></h5>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="$modal.hide('edit-user')">
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
                            <input type="text" class="form-control" disabled id="email" name="email" v-model="user.email" >
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
                this.id = event.params;
                axios.get(this.$route('users.show',event.params)).then((response) =>
                    {
                        this.user = response.data;
                    }
                )
            },
        }
    }
</script>
