
// area chart

Morris.Area({
    element: 'area-chart',
    behaveLikeLine: true,
    gridEnabled: false,
    gridLineColor: '#e5ebf8',
    axes: true,
    fillOpacity:.7,
    data: [
        {period: '2015 Q1', iphone: 2666, ipad: null, itouch: 2647},
        {period: '2015 Q2', iphone: 15278, ipad: 4294, itouch: 2441},
        {period: '2015 Q3', iphone: 4912, ipad: 1969, itouch: 2501},
        {period: '2015 Q4', iphone: 3767, ipad: 3597, itouch: 5689},
        {period: '2016 Q1', iphone: 6810, ipad: 13914, itouch: 2293},
        {period: '2016 Q2', iphone: 5670, ipad: 4293, itouch: 1881},
        {period: '2016 Q3', iphone: 4820, ipad: 23795, itouch: 1588},
        {period: '2016 Q4', iphone: 15073, ipad: 5967, itouch: 5175},
        {period: '2017 Q1', iphone: 10687, ipad: 4460, itouch: 2028},
        {period: '2017 Q2', iphone: 8432, ipad: 5713, itouch: 1791}
    ],
    lineColors:['#FF518A','#FFEA80','#36a2f5'],
    xkey: 'period',
    ykeys: ['iphone', 'ipad', 'itouch'],
    labels: ['iPhone', 'iPad', 'iPod Touch'],
    pointSize: 4,
    lineWidth: 1,
    hideHover: 'auto'

});


