<template>
    
   <div id="container">
  	
 <div id="container_chart"></div>

</div>
</template>


<script>

    export default {

     
        mounted() {
const version="v1";
const Token='3252352-test-test-test-sgs332fs3f';
$.ajaxSetup({
  headers : {
       'Token' : Token
  }
});

 $.getJSON("/api"+"/"+version+"/onboarding", function(response) {
                    //this.$set(this,'rooms', response.data )
                    console.log(JSON.stringify(response));
 
               
var highchartsOptions = Highcharts.chart('container_chart', {

    title: {
        text: 'Onboarding process'
    },

    subtitle: {
        text: 'Source: Temper'
    },

    yAxis: {
        title: {
            text: 'Number of Users'
        }
    },
    xAxis: {
        title: {
            text: 'Onboarding Percentage'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            pointStart: 0
        }
    },

    series: response

});
 });
    this.chart = new Highcharts.chart(highchartsOptions)
           
        },

        data : function() {
            return {
                
            }

        },

        methods : {

            redraw(){
    	this.chart.series[0].setData(this.agePotValue,true);
    }
        }

       
        }
    
</script>
