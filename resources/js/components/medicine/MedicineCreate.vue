<template>
   <div>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-rounded m-1" @click="$modal.show('create-medicine')">
                Registrar Medicamentos
            </button>
        </div>
        <modal name="create-medicine" height="auto" width="50%" @before-open="beforeOpen" :scrollable="true">
                <alv-form :action="route('medicine.store')" method="post" id="createMedicine" :spinner="true" @after-done="afterDone" autocomplete="off" :data-object="medicine" ref="alv-form" >
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Registrar Medicamentos</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('create-medicine')">
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
                            <label for="name">Presentacion</label>
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
                
                medicine:
                {
                    nombre: '',
                    tipo_medicamento: '',
                    presentacion: '',
                    activo: '',
                    precio_compra: '',
                    precio_venta:''
                }
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
            beforeOpen()
            {
               
                this.medicine.nombre = '';
                this.medicine.tipo_medicamento = '';
                this.medicine.presentacion = '';
                this.medicine.activo = '';
                this.medicine.precio_compra = '';
                this.medicine.precio_venta= '';
            },
        }
    }
</script>