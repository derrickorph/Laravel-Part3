<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <title>Contact Form</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Dream Site</div>
                        <div class="card-body">
                            <h1>Contact Message</h1>
                            <p>Nom: {{ $details['name'] }}</p>
                            <p>Email: {{ $details['email'] }}</p>
                            <p>Téléphone: {{ $details['phone'] }}</p>
                            <p>Message: {{ $details['msg'] }}</p>
m                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>


</body>
</html>
