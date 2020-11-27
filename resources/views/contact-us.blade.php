<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/toastr.min.css">

    <title>Contact-us</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Contact Us</div>
                        <div class="card-body">
                            @if (Session::has('message_sent'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message_sent') }}
                                </div>

                            @endif
                            <form action="{{ route('email.send') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Entrer votre nom">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="exemple@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Entrer votre numéro de téléphone">
                                </div>
                                <div class="form-group">
                                    <label for="msg">Votre message</label>
                                    <textarea id="msg" class="form-control" name="msg" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-success btn-sm float-right">Envoyer</button>
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

    @if (Session::has('message_sent'))
        <script>
            toastr.success("{!! Session::get('message_sent') !!}")
        </script>

    @endif

    @if (Session::has('message_sent'))
        <script>
            swal("Great Job!","{!! Session::get('message_sent') !!}","success",{
                button:"OK",
            })
        </script>

    @endif
</body>
</html>
