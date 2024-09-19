var growChartValue = {
    series: [{
    name: 'Messenger',
    data: [
        [16.4, 50],
        [21.7, 14],
        [25.4, 12],
    ]
    }, {
        name: 'Instagram',
        data: [
            [10.9, 11],
            [20.9, 7],
            [12.9, 8.2],
            [6.4, 14],
            [11.6, 12]
        ]
    }],
        chart: {
        height: 350,
        type: 'scatter',
        animations: {
        enabled: false,
        },
        zoom: {
        enabled: false,
        },
        toolbar: {
        show: false
        }
    },
    colors: ['#056BF6', '#D2376A'],
    xaxis: {
        tickAmount: 10,
        min: 0,
        max: 40
    },
    yaxis: {
        tickAmount: 7
    },
    markers: {
        size: 20
    },
    title: {
        text: 'This is how your networks have grown compared.',
        align: 'left'
    },
    fill: {
        type: 'image',
        opacity: 1,
        image: {
        src: ['postflow_assests/images/logos/facebook_logo.png', 'postflow_assests/images/logos/tweet_social.png'],
        width: 40,
        height: 40
        }
    },
    legend: {
        labels: {
        useSeriesColors: true
        },
        markers: {
        customHTML: [
            function() {
            return '<span><i class="fab fa-facebook"></i></span>'
            }, function() {
            return '<span><i class="fab fa-instagram"></i></span>'
            }
        ]
        }
    }
};

const growChart = new ApexCharts(document.querySelector("#growchart"), growChartValue);
growChart.render();

var scoreChartValue = {
    series: [{
        name: "STOCK ABC",
        data: [80, 50, 30, 40, 100, 20],
    }],
    chart: {
        type: 'area',
        height: 350,
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
        text: 'Fundamental Analysis of Stocks',
        align: 'left'
    },
    labels: ['2011', '2012', '2013', '2014', '2015', '2016'],
    xaxis: {
        type: 'datetime',
    },
    yaxis: {
        opposite: true
    },
    legend: {
        horizontalAlign: 'left'
    }
};

var scoreChart = new ApexCharts(document.querySelector("#scorechart"), scoreChartValue);
scoreChart.render();

var performanceChartOption = {
    series: [
        {
            name: 'Q1 Budget',
            group: 'budget',
            data: [44000, 55000, 41000, 67000, 22000, 43000]
        },
        {
            name: 'Q1 Actual',
            group: 'actual',
            data: [48000, 50000, 40000, 65000, 25000, 40000]
        },
        {
            name: 'Q2 Budget',
            group: 'budget',
            data: [13000, 36000, 20000, 8000, 13000, 27000]
        },
        {
            name: 'Q2 Actual',
            group: 'actual',
            data: [20000, 40000, 25000, 10000, 12000, 28000]
        }
    ],
    chart: {
        type: 'bar',
        height: 350,
        stacked: true,
    },
    stroke: {
        width: 1,
        colors: ['#fff']
    },
    dataLabels: {
        formatter: (val) => {
        return val / 1000 + 'K'
        }
    },
    plotOptions: {
        bar: {
        horizontal: false
        }
    },
    xaxis: {
        categories: [
        'Advertising',
        'Sales',
        'Print',
        'Catalogs',
        'Meetings',
        'Public'
        ]
    },
    fill: {
        opacity: 1
    },
    colors: ['#80c7fd', '#008FFB', '#80f1cb', '#00E396'],
    yaxis: {
        labels: {
        formatter: (val) => {
            return val / 1000 + 'K'
        }
        }
    },
    legend: {
        position: 'top',
        horizontalAlign: 'left'
    }
};

var performanceChart = new ApexCharts(document.querySelector("#performancechart"), performanceChartOption);
performanceChart.render();


var productionChartOption = {
    series: [{
            name: "SAMPLE A",
            data: [
            [16.4, 5.4], [21.7, 2], [25.4, 3], [19, 2], [10.9, 1], [13.6, 3.2], [10.9, 7.4], [10.9, 0], [10.9, 8.2], [16.4, 0], [16.4, 1.8], [13.6, 0.3], [13.6, 0], [29.9, 0], [27.1, 2.3], [16.4, 0], [13.6, 3.7], [10.9, 5.2], [16.4, 6.5], [10.9, 0], [24.5, 7.1], [10.9, 0], [8.1, 4.7], [19, 0], [21.7, 1.8], [27.1, 0], [24.5, 0], [27.1, 0], [29.9, 1.5], [27.1, 0.8], [22.1, 2]]
        },{
            name: "SAMPLE B",
            data: [
            [36.4, 13.4], [1.7, 11], [5.4, 8], [9, 17], [1.9, 4], [3.6, 12.2], [1.9, 14.4], [1.9, 9], [1.9, 13.2], [1.4, 7], [6.4, 8.8], [3.6, 4.3], [1.6, 10], [9.9, 2], [7.1, 15], [1.4, 0], [3.6, 13.7], [1.9, 15.2], [6.4, 16.5], [0.9, 10], [4.5, 17.1], [10.9, 10], [0.1, 14.7], [9, 10], [12.7, 11.8], [2.1, 10], [2.5, 10], [27.1, 10], [2.9, 11.5], [7.1, 10.8], [2.1, 12]]
        },{
            name: "SAMPLE C",
            data: [
            [21.7, 3], [23.6, 3.5], [24.6, 3], [29.9, 3], [21.7, 20], [23, 2], [10.9, 3], [28, 4], [27.1, 0.3], [16.4, 4], [13.6, 0], [19, 5], [22.4, 3], [24.5, 3], [32.6, 3], [27.1, 4], [29.6, 6], [31.6, 8], [21.6, 5], [20.9, 4], [22.4, 0], [32.6, 10.3], [29.7, 20.8], [24.5, 0.8], [21.4, 0], [21.7, 6.9], [28.6, 7.7], [15.4, 0], [18.1, 0], [33.4, 0], [16.4, 0]]
        }],
    chart: {
        height: 350,
        type: 'scatter',
        zoom: {
        enabled: true,
        type: 'xy'
    }
    },
    xaxis: {
        tickAmount: 10,
        labels: {
        formatter: function(val) {
            return parseFloat(val).toFixed(1)
        }
        }
    },
    yaxis: {
        tickAmount: 7
    }
};
var productionChart = new ApexCharts(document.querySelector("#productionchart"), productionChartOption);
productionChart.render();

var bestInteractionChartOption = {
    series: [44, 55, 13, 43, 22],
        chart: {
        width: 380,
        type: 'pie',
    },
    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
    responsive: [{
        breakpoint: 480,
        options: {
        chart: {
            width: 200
        },
        legend: {
            position: 'bottom'
        }
        }
    }]
};

var interactionChart = new ApexCharts(document.querySelector("#bestinteraction"), bestInteractionChartOption);
var bestTypeOfChart = new ApexCharts(document.querySelector("#besttypeofpost"), bestInteractionChartOption);
interactionChart.render();
bestTypeOfChart.render();

var mostlikeChartOption = {
    series: [
        {
        name: "High - 2013",
        data: [28, 29, 33, 36, 32, 32, 33]
        },
        {
        name: "Low - 2013",
        data: [12, 11, 14, 18, 17, 13, 13]
        }
    ],
    chart: {
        height: 350,
        type: 'line',
        dropShadow: {
        enabled: true,
        color: '#000',
        top: 18,
        left: 7,
        blur: 10,
        opacity: 0.2
        },
        zoom: {
        enabled: false
        },
        toolbar: {
        show: false
        }
    },
    colors: ['#77B6EA', '#545454'],
    dataLabels: {
        enabled: true,
    },
    stroke: {
        curve: 'smooth'
    },
    title: {
        text: 'Average High & Low Temperature',
        align: 'left'
    },
    grid: {
        borderColor: '#e7e7e7',
        row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
        },
    },
    markers: {
        size: 1
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        title: {
        text: 'Month'
        }
    },
    yaxis: {
        title: {
        text: 'Temperature'
        },
        min: 5,
        max: 40
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
    }
};

var mostLikeChart = new ApexCharts(document.querySelector("#mostlike"), mostlikeChartOption);
mostLikeChart.render();
var commentsChart = new ApexCharts(document.querySelector("#comments"), mostlikeChartOption);
commentsChart.render();

const swiper = new Swiper('.custom-swiper-container', {
    loop: false,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    paginationClickable: true,
    spaceBetween: 20,
    breakpoints: {
        1920: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1028: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        600: {
            slidesPerView: 1.5,
            spaceBetween: 20
        },
        380: {
            slidesPerView: 1,
            spaceBetween: 20
        }
    }
});
