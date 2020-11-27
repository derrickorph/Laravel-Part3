<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Import~Form</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Import</div>
                        <div class="card-body">
                            @if (Session::has('file_imported'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('file_imported') }}
                                </div>

                            @endif
                            <form action="{{ route('employee.import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Choose CSV</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-outline-info btn-sm float-right">Import File</button>
                            </form>
                        </div>
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
