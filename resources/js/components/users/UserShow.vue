<template>
    <div>
        <modal name="show-user" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Datos del Usuario</strong></h5>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-user')">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" disabled v-model="user.name" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">Correo</label>
                        <input type="text" class="form-control" id="email" name="email" disabled v-model="user.email" >
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
            }
        },
        methods: {
            beforeOpen(event)
            {
                axios.get(this.$route('users.show',event.params)).then((response) =>
                    {
                        this.user = response.data;
                    }
                )
            },
            beforeClose()
            {
                this.user.name = '';
                this.user.email = '';
            }
        }
    }
</script>
