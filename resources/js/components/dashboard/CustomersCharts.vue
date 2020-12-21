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
              name: "Usuarios",
              data: [0,0,0,0,0,0,0,0,0,0,0,5]
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
              text: 'Usuarios por mes',
              align: 'left'
            },
            grid: {
              row: {
                colors: ['#d3d3d3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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