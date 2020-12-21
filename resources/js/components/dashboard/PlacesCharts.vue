<template>
        <div id="chart">
        <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>
<script>
export default {
    data()
    {
        return{
             series: [{
              name: "Favoritos",
              data: [2,1,1,1,1]
          }],
          chartOptions: {
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: 'Lugares Populares',
              align: 'left'
            },
            grid: {
              row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {
              categories: ['Mexico Viejo', 'Central 16', 'La Colifata 16', 'Pepito´s Bar', 'PULQUERIA MAYAHUEL'],
            }
          },
        }
    },
    created()
    {
        this.getDatas();
    },
    methods:{
      
    }
}
</script>