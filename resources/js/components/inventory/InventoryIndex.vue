<template>
    <div>
       <v-server-table :url="$route('inventory.index')" :columns="columns" ref="table" :options="options" :filterByColumn="true" >
            <div slot="actions" slot-scope="props" class="action-buttons">
                        <button  title="Ver" :data-id="props.row.id"   type="button" class="btn btn-success">
                            <i class="fas fa-eye"></i>
                        </button>
                       
            </div>
        </v-server-table>
    </div>
</template>
<script>

    import text from './../tables/text.js';
    export default {
        data(){
            return {
                options: {
                    debounce:1500,
                    perPage: 10,
                    perPageValues: [10,25,50,100],
                    filterByColumn: true,
                    headings: {
                        "medicine.nombre": "Medicamento",
                        "cantidad": "Cantidad",
                         actions: "Acciones",
                        human_date_created:"Fecha"
                    },
                    sortable:['title',' author','human_date_created'],
                    sortIcon :{ base:'fas float-right', up:'fa-arrow-up ', down:'fa-arrow-down', is:'fa-sort' },
                    pagination:{
                        chunk: 50,
                    },
                    texts: text,
                },
                columns:['medicine.nombre','cantidad','actions'],

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