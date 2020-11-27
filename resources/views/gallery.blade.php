<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Image Gallery</title>
    <style>
        img{
            background-color: grey;
            height: 250px;
            widows: 100%;
            border: 1px solid grey;
            margin-top: 20px;
            box-shadow: 0 8px 6px -6px black;
        }
    </style>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">


                    @for ($i = 1; $i < 30; $i++)
                        <img  data-original="/images/1605020812.jpeg">
                    @endfor


            </div>
        </div>
    </section>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/jquery.lazyload.min.js"></script>
    <script>
        $(document).ready(function(){
            $('img').lazyload({effect : "fadeIn"});
        })
    </script>
</body>
</html>
