<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/toastr.min.css">

    <title>Add~Eleve</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Ajouter Eleve</div>
                        <div class="card-body">
                            @if (Session::has('eleve_added'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('eleve_added') }}
                                </div>

                            @endif
                            <form action="{{ route('eleve.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Entrer le nom de l'élève">
                                </div>
                                <div class="form-group">
                                    <label for="file">Choisir la Photo de Profil</label>
                                    <input type="file" name="file" id="file" class="form-control" onchange="previewFile(this)">
                                    <img  id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px">
                                </div>
                                <a href="/all-eleves" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-outline-success btn-sm float-right">Enregister</button>
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
    <script src="/assets/toastr.min.js"></script>
    <script src="/assets/sweetalert.min.js"></script>
    <script>
        function previewFile(input) {
            var file=$("input[type=file]").get(0).files[0];

            if (file)
            {
                var reader= new FileReader();
                reader.onload= function () {
                    $('#previewImg').attr("src",reader.result)
                }
                reader.readAsDataURL(file);
            }
        }

    </script>
    @if (Session::has('eleve_added'))
        <script>
            toastr.success("{!! Session::get('eleve_added') !!}")
        </script>

    @endif

    @if (Session::has('eleve_added'))
        <script>
            swal("Great Job!","{!! Session::get('eleve_added') !!}","success",{
                button:"OK",
            })
        </script>

    @endif
</body>
</html>
