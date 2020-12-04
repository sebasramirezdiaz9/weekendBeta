<template>
    <div>
        <modal name="show-provider" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <div class="modal-header">
                        <h5 class="modal-title"><strong>Datos del Proveedor</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-provider')">
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
                            <input type="text" disabled class="form-control" id="razon_social" name="provider.razon_social" v-model="provider.razon_social" >
                        </div>
                    </div>
                     
                </div>
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Teléfono</label>
                            <input type="text" disabled class="form-control" id="telefono" name="provider.telefono" v-model="provider.telefono" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Contacto Directo</label>
                            <input type="text" disabled class="form-control" id="contacto_directo" name="provider.contacto_directo" v-model="provider.contacto_directo" >
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
               provider:
                {
                    razon_social: '',
                    telefono: '',
                    contacto_directo:''
                }
            }
        },
        methods: {
            beforeOpen(event)
            {
                axios.get(this.$route('provider.show',event.params)).then((response) =>
                    {
                        
                        this.provider = response.data;
                    }
                )
            },
            beforeClose()
            {
                this.provider.razon_social = '';
                this.provider.telefono = '';
                this.provider.contacto_directo = '';
            }
        }
    }
</script>