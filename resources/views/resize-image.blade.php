<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Resize~Image</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Resize Image</div>
                        <div class="card-body">
                            @if (Session::has('image_resized'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('image_resized') }}
                                </div>

                            @endif
                            <form action="{{ route('resize.imagesubmit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Choose Image</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-outline-danger btn-sm float-right">Resize Image</button>
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
