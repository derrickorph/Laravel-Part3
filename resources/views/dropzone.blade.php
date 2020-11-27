<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/dropzone.min.css">
    <title>Dropzone File Upload</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3">Dropzone File Upload</div>
                        <div class="card-body">
                            @if (Session::has('file_imported'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('file_imported') }}
                                </div>

                            @endif
                            <form action="{{ route('dropzone.store')}}" method="post" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                                @csrf
                                <div >
                                    <h3 class="text-center text-primary">Upload Image By Click On Box</h3>
                                </div>
                                <div class="dz-default dz-message">
                                    <span>Drop file here to upload</span>
                                </div>

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
    <script src="/assets/dropzone.min.js"></script>
</body>
</html>
