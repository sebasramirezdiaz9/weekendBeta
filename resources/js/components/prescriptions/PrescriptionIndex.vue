<template>
    <div>
       <v-server-table :url="$route('prescriptions.index')" :columns="columns" ref="table" :options="options" :filterByColumn="true" >
            <div slot="actions" slot-scope="props" class="action-buttons">
                <button  title="Ver" :data-id="props.row.id"  type="button" class="btn btn-success" @click="$modal.show('show-patient',props.row.id)">
                    <i class="fas fa-eye"></i>
                </button>
                <button  title="Imprimir Receta" :data-id="props.row.id" type="button" class="btn btn-warning"  @click="downloadFile(props.row.id)">
                   <i class="fas fa-file-download"></i>
                </button>
                <button  title="Eliminar" :data-id="props.row.id"  class="btn btn-danger" @click="deleteRegister(props.row.id)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </v-server-table>
        <prescription-show></prescription-show>
    </div>
</template>
<script>

    import text from './../tables/text.js';
    import PrescriptionShow from './PrescriptionShow.vue';
    import Swal from 'sweetalert2';
    export default {
        data(){
            return {
                options: {
                    debounce:1500,
                    perPage: 10,
                    perPageValues: [10,25,50,100],
                    filterByColumn: true,
                    headings: {
                        doctor: "Doctor",
                        actions: "Acciones",
                        paciente:"Paciente",
                        estado:"Estado de la Receta",
                        human_date_created:"Fecha"
                    },
                    sortable:['title',' author','human_date_created'],
                    sortIcon :{ base:'fas float-right', up:'fa-arrow-up ', down:'fa-arrow-down', is:'fa-sort' },
                    pagination:{
                        chunk: 50,
                    },
                    texts: text,
                },
                columns:['doctor','paciente','estado','human_date_created' ,'actions'],

            }
        },
        components:{
            PrescriptionShow,
        },
        methods: {
            deleteRegister(id) {
                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡Si eliminas este registro ya no se podra recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete(route('prescriptions.destroy', [id]), {
                        }).then( () => {
                            this.$refs.table.refresh();
                        }).catch(function (error) {
                            console.log(error);
                        });
                        Swal.fire(
                            'Eliminado!',
                            'El registro se elimino correctamente.',
                            'success'
                        )
                    }
                });
            },
             downloadFile(id){
            axios({
                method: "GET",
                url: (this.$route('prescription.pdf',id)),
                responseType: 'blob'

            }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download',response.headers['content-disposition'].match('\"(.*?)\"')[1]); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }   
        }
    }
</script>


<style>
    .action-buttons {
        min-width: 100px;
    }
    .VueTables__actions-filter-wrapper{
        display: none;
    }
</style>
