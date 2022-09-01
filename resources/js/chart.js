/******************* Company Facts Employees ***********************/  
const DATA_COUNT = 5;
const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
// Change these settings to change the display for different parts of the X axis
// grid configuiration
const DISPLAY = false;
const BORDER = true;
const CHART_AREA = true;
const TICKS = true;
const FILL = false;

// const labels = Utils.months({count: 7});
const labels = ['January','February','March','April','May'];
const data = {
    labels: labels,
    datasets: [
        {
            label: 'Graph 1',
            // data: Utils.numbers(NUMBER_CFG),
            data: [0, 40, 5, 30, 45],
            // borderColor: Utils.CHART_COLORS.red,
            // backgroundColor: Utils.CHART_COLORS.red,
            borderColor: "rgb(255, 99, 132)",
            backgroundColor: "rgb(255, 99, 132)",
            fill: FILL
        },
        {
            label: 'Graph 2',
            // data: Utils.numbers(NUMBER_CFG),
            data: [30, 2, 55, 28, 54],
            // borderColor: Utils.CHART_COLORS.blue,
            // backgroundColor: Utils.CHART_COLORS.blue,
            borderColor: "rgb(54, 162, 235)",
            backgroundColor: "rgb(54, 162, 235)",
            fill: FILL
        },
        {
            label: 'Graph 3',
            // data: Utils.numbers(NUMBER_CFG),
            data: [40, 13, 55, 22, 45],
            // borderColor: Utils.CHART_COLORS.green,
            // backgroundColor: Utils.CHART_COLORS.green,
            borderColor: "rgb(75, 192, 192)",
            backgroundColor: "rgb(75, 192, 192)",
            fill: FILL
        },
        {
            label: 'Graph 4',
            // data: Utils.numbers(NUMBER_CFG),
            data: [9, 46, 35, 15, 55],
            // borderColor: Utils.CHART_COLORS.yellow,
            // backgroundColor: Utils.CHART_COLORS.yellow,
            borderColor: "rgb(255, 205, 86)",
            backgroundColor: "rgb(255, 205, 86)",
            fill: FILL
        }
    ]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: false,
                text: (ctx) => 'Chart.js Line Chart - stacked=' + ctx.chart.options.scales.y.stacked
            },
            tooltip: {
                mode: 'index'
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    boxWidth: 20,
                } 
            },
        },
        interaction: {
            mode: 'nearest',
            axis: 'x',
            intersect: false
        },
        scales: {
            x: {
                title: {
                    display: false,
                    text: 'Month'
                },
                grid: {
                    display: DISPLAY,
                    drawBorder: BORDER,
                    drawOnChartArea: CHART_AREA,
                    drawTicks: TICKS,
                },
            },
            y: {
                stacked: true,
                title: {
                display: false,
                text: 'Value'
                }
            }
        }
    }
};

const myChart = new Chart(
    document.getElementById('mylineChart'),
    config
);
const myMobileChart = new Chart(
    document.getElementById('mymobilelineChart'),
    config
);

/******************* First Statistics ***********************/
const RADAR_DATA_COUNT = 7;
const RADAR_NUMBER_CFG = {count: RADAR_DATA_COUNT, min: 0, max: 100};

const radar_labels = ['January','February','March','April','May'];
const radar_dataFirstSkip = [0, 40, 5, 30, 45];
const radar_dataMiddleSkip = [30, 2, 55, 28, 54];
const radar_dataLastSkip = [40, 13, 55, 22, 45];

radar_dataFirstSkip[0] = null;
radar_dataMiddleSkip[Number.parseInt(radar_dataMiddleSkip.length / 2, 10)] = null;
radar_dataLastSkip[radar_dataLastSkip.length - 1] = null;

const radar_data = {
  labels: radar_labels,
  datasets: [
    {
      label: 'Graph 1',
      data: radar_dataFirstSkip,
    //   borderColor: Utils.CHART_COLORS.red,
    //   backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
      borderColor: "rgb(255, 99, 132)",
      backgroundColor: ("rgb(255, 99, 132, 0.6)"),
    },
    {
      label: 'Graph 2',
      data: radar_dataMiddleSkip,
    //   borderColor: Utils.CHART_COLORS.blue,
    //   backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
      borderColor: "rgb(54, 162, 235)",
      backgroundColor: "rgb(54, 162, 235, 0.6)",
    },
    {
      label: 'Graph 3',
      data: radar_dataLastSkip,
    //   borderColor: Utils.CHART_COLORS.green,
    //   backgroundColor: Utils.transparentize(Utils.CHART_COLORS.green, 0.5),
      borderColor: "rgb(75, 192, 192)",
      backgroundColor: "rgb(75, 192, 192, 0.6)",
    }
  ]
}; 

const radar_config = {
    type: 'radar',
    data: radar_data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        title: {
          display: false,
          text: 'Chart.js Radar Skip Points Chart 1'
        },
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                boxWidth: 20,
            } 
        },
      }
    },
};

const myRadarChart = new Chart(
    document.getElementById('myradarChart'),
    radar_config
);

const myMobileRadarChart = new Chart(
    document.getElementById('mymobileradarChart'),
    radar_config
);