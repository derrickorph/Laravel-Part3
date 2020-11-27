<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/buttons.bootstrap4.min.css">

    <title>Employee-Datatable</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3">Add Post</div>
                        <div class="card-body">
                            @if (Session::has('post_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('post_created') }}
                                </div>

                            @endif
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/jquery.dataTables.min.js"></script>
    <script src="/assets/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/dataTables.buttons.min.js"></script>
    <script src="/assets/buttons.bootstrap4.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>



    {!! $dataTable->scripts() !!}
</body>
</html>
