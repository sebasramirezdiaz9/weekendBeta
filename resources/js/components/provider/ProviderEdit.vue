<template>
    <div>
        <modal name="edit-provider" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('provider.update',id)" method="put" id="updateProvider" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="provider" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Editar Proveedor</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('edit-provider')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Datos del Proveedor
                                </div>
                          </div>
                      </div>
                       <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Razon Social</label>
                            <input type="text" class="form-control" id="razon_social" name="provider.razon_social" v-model="provider.razon_social" >
                        </div>
                    </div>
                     
                </div>
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="provider.telefono" v-model="provider.telefono" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Contacto Directo</label>
                            <input type="text" class="form-control" id="contacto_directo" name="provider.contacto_directo" v-model="provider.contacto_directo" >
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
                  provider:
                {
                    razon_social: '',
                    telefono: '',
                    contacto_directo:''
                },
                id: 0
            }
        },
        methods: {
            afterDone(response){
                if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('provider.view');
                 }
            },
            beforeOpen(event)
            {
                console.log(event);
                this.id = event.params;
                axios.get(this.$route('provider.show',event.params)).then((response) =>
                    {
                       
                        this.provider = response.data;
                    }
                )
            },
        }
    }
</script>