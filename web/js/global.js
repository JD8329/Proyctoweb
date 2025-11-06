$(document).ready(function() {
    /* Mensaje de alerta sin refresco de pagina */  
});

var functionGraphStackedBar = function(container, title, subtitle, valueY, valueX, categories, series){  
    Highcharts.chart(container, {
      chart: {
          type: 'column'
      },
      title: {
          text: title
      },
      subtitle: {
          text: subtitle
      },
      xAxis: {
          categories: categories,
          crosshair: true,
          accessibility: {
              description: valueX
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: valueY
          }
      },
      tooltip: {
          valueSuffix: valueY
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: series
  });
}

var functionGraphBasicLine = function(container, title, subtitle, valueY, valueX, series){  
    Highcharts.chart(container, {

        title: {
            text: title
        },
    
        subtitle: {
            text: subtitle
        },
    
        yAxis: {
            title: {
                text: valueY
            }
        },
    
        xAxis: {
            accessibility: {
                rangeDescription: valueX
            }
        },
    
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
    
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },
    
        series: series,
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    
    });
};