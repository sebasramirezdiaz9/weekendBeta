<template>
    <div>
        <modal name="edit-medicine" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('medicine.update',id)" method="put" id="updateMedicine" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="medicine" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Editar Medicamento</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('edit-medicine')">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="alert alert-info" role="alert">
                               Datos de Medicamento
                                </div>
                          </div>
                      </div>
                       <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre del medicamento</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" v-model="medicine.nombre" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Tipo de Medicamento</label>
                            <select  class="form-control" id="tipo_medicamento" name="tipo_medicamento" v-model="medicine.tipo_medicamento" >
                                <option value="generico">Genérico</option>
                                <option value="patente">Patente</option>
                            </select>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Presentación</label>
                            <input type="text" class="form-control" id="presentacion" name="presentacion" v-model="medicine.presentacion" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Activo</label>
                            <input type="text" class="form-control" id="telefono" name="activo" v-model="medicine.activo" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Precio Compra</label>
                            <input type="number" class="form-control" id="precio_compra" name="precio_compra" v-model="medicine.precio_compra" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Precio Venta</label>
                             <input type="number" class="form-control" id="precio_venta" name="precio_venta" v-model="medicine.precio_venta" >
                            
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
                   medicine:
                {
                    nombre: '',
                    tipo_medicamento: '',
                    presentacion: '',
                    activo: '',
                    precio_compra: '',
                    precio_venta:''
                },
                id: 0
            }
        },
        methods: {
            afterDone(response){
                if(response)
                 {
                    //this.showToastr({type: 'success', title: 'Exito', message: 'El usuario se creó correctamente'});
                    window.location = this.route('medicine.view');
                 }
            },
            beforeOpen(event)
            {
                console.log(event);
                this.id = event.params;
                axios.get(this.$route('medicine.show',event.params)).then((response) =>
                    {
                       
                        this.medicine = response.data;
                    }
                )
            },
        }
    }
</script>
