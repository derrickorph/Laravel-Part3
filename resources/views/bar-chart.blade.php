<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>BarCharts</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3"> BarCharts</div>
                        <div class="card-body">
                            <canvas id="barChart" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/Chart.bundle.min.js"></script>
    <script>
        $(function() {
            var datas = JSON.parse('<?= json_encode($datas)?>');
            var barCanvas=$('#barChart');
            var barChart= new Chart(barCanvas,{
                type:'bar',
                data:{
                    labels:['Jan','Feb','Mar','Apr','Mai','Jun','July','Aug','Sep','Oct','Nov','Dec'],
                    datasets:[{
                        label:'New User Growth,2020',
                        data:datas,
                        backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown']
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        })
    </script>
</body>
</html>
