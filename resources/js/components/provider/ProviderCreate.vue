<template>
    <div>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-rounded m-1" @click="$modal.show('create-provider')">
                Agregar Proveedor
            </button>
        </div>
        <modal name="create-provider" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('provider.store')" method="post" id="createProvider" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="provider" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Crear Proveedor</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('create-provider')">
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
                            <input type="text" class="form-control" id="razon_social" name="razon_social" v-model="provider.razon_social" >
                        </div>
                    </div>
                     
                </div>
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" v-model="provider.telefono" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Contacto Directo</label>
                            <input type="text" class="form-control" id="contacto_directo" name="contacto_directo" v-model="provider.contacto_directo" >
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
                provider:
                {
                    razon_social: '',
                    telefono: '',
                    contacto_directo:''
                }
            }
        },
        methods: {
             afterDone(response){
               if(response)
                 {
                    
                    window.location = this.route('provider.view');
                 }
            },
            beforeOpen()
            {
                this.provider.razon_social = '';
                this.provider.telefono = '';
                this.provider.contacto_directo = '';
            },
        }
    }
</script>