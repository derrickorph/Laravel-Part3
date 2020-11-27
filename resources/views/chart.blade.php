<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>HighCharts</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3"> HighCharts</div>
                        <div class="card-body">
                            <div id="chart-container">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/highcharts.js"></script>
    <script>
        var datas = JSON.parse('<?= json_encode($datas)?>');
        Highcharts.chart('chart-container',{
            title:{
                text:'New User Growth,2020'
            },
            subtitle:{
                text:'Source: Dream-Site'
            },
            xAxis:{
                categories:['Jan','Feb','Mar','Apr','Mai','Jun','July','Aug','Sep','Oct','Nov','Dec']
            },
            yAxis:{
                title:{
                    text:'Number of New User'
                }
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series:[{
                    name:'  New User',
                    data:datas,
            }],
            responsive:{
                rules:[{
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout:'horizontal',
                            align:'center',
                            verticalAlign:'bottom'
                        }
                    }

                }]
            }
        })
    </script>
</body>
</html>
