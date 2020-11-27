<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Edit~Eleve</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Editer Eleve</div>
                        <div class="card-body">
                            @if (Session::has('eleve_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('eleve_updated') }}
                                </div>

                            @endif
                            <form action="{{ route('eleve.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $eleve->id }}">

                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name" value="{{ $eleve->name }}" class="form-control" placeholder="Entrer le nom de l'élève">
                                </div>
                                <div class="form-group">
                                    <label for="file">Choisir la Photo de Profil</label>
                                    <input type="file" name="file" id="file" class="form-control" onchange="previewFile(this)">
                                    <img  id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ $eleve->profileimage }}" style="max-width:130px;margin-top:20px">
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
</body>
</html>
