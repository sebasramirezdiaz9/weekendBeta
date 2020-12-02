<template>
    <div>
       <v-server-table :url="$route('file.index')" :columns="columns" ref="table" :options="options" :filterByColumn="true" >
            <div slot="actions" slot-scope="props" class="action-buttons">
                        <button  title="Ver" :data-id="props.row.id"  type="button" class="btn btn-success" @click="$modal.show('show-file',props.row.id)">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button  title="Editar" :data-id="props.row.id" type="button" class="btn btn-info"  @click="$modal.show('edit-file',props.row.id)">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                        </button>
                    <button  title="Eliminar" :data-id="props.row.id"  class="btn btn-danger" @click="deleteRegister(props.row.id)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
            </div>
        </v-server-table>
        <file-show></file-show>
        <file-edit></file-edit>
    </div>
</template>
<script>

    import text from './../tables/text.js';
    import FileShow from './FileShow.vue';
    import FileEdit from './FileEdit';
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
                        "patient.name": "Paciente",
                        peso:"Peso",
                        altura: "Altura",
                        actions: "Acciones",
                        alergias: "Alergias",
                        human_date_created:"Fecha"
                    },
                    sortable:['title',' author','human_date_created'],
                    sortIcon :{ base:'fas float-right', up:'fa-arrow-up ', down:'fa-arrow-down', is:'fa-sort' },
                    pagination:{
                        chunk: 50,
                    },
                    texts: text,
                },
                columns:['patient.name','peso','altura','alergias','actions'],

            }
        },
        components:{
            FileShow,
            FileEdit
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
                        axios.delete(route('file.destroy', [id]), {
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
