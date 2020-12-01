<template>
    <div>
        <modal name="show-medicine" height="auto" width="50%" @before-open="beforeOpen" @before-close="beforeClose" :scrollable="true">
                <div class="modal-header">
                        <h5 class="modal-title"><strong>Datos de Medicamento</strong></h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" @click="$modal.hide('show-medicine')">
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
                            <input type="text" class="form-control" disabled id="nombre" name="nombre" v-model="medicine.nombre" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Tipo de Medicamento</label>
                            <select  class="form-control" id="tipo_medicamento" disabled name="tipo_medicamento" v-model="medicine.tipo_medicamento" >
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
                            <input type="text" class="form-control" id="presentacion" disabled name="presentacion" v-model="medicine.presentacion" >
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Activo</label>
                            <input type="text" class="form-control" id="telefono" disabled name="activo" v-model="medicine.activo" >
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Precio Compra</label>
                            <input type="number" class="form-control" id="precio_compra" disabled name="precio_compra" v-model="medicine.precio_compra" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Precio Venta</label>
                             <input type="number" class="form-control" id="precio_venta" disabled name="precio_venta" v-model="medicine.precio_venta" >
                            
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
            beforeOpen(event)
            {
                axios.get(this.$route('medicine.show',event.params)).then((response) =>
                    {
                        
                        this.medicine = response.data;
                    }
                )
            },
            beforeClose()
            {
                this.medicine.nombre = '';
                this.medicine.tipo_medicamento = '';
                this.medicine.presentacion = '';
                this.medicine.activo = '';
                this.medicine.precio_compra = '';
                this.medicine.precio_venta= '';
            }
        }
    }
</script>