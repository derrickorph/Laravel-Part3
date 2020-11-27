<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <title>Register</title>
    <style>
        .parsley-errors-list li{
            list-style-type: none;
            color: red;
        }
    </style>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3"> Register</div>
                        <div class="card-body">

                            <form id="registerForm" method="POST" action="{{ route('auth.registersubmit') }}" data-parsley-validate>
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name"  class="form-control" data-parsley-required="true" data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" data-parsley-required="true" data-parsley-type="email" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" class="form-control" type="password" name="password" data-parsley-required="true" data-parsley-length="[6-12]" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirmationn de mot de passe</label>
                                    <input id="cpassword" class="form-control" type="password" name="cpassword" data-parsley-equalto="#password" data-parsley-required="true" data-parsley-trigger="keyup">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input id="phone" class="form-control" type="number" name="phone" data-parsley-required="true" data-parsley-pattern="[0-9]+$" data-parsley-length="[8-10]" data-parsley-trigger="keyup">
                                </div>
                                <a href="/posts" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-sm btn-success">Enregister</button>
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
    <script src="/assets/parsley.min.js"></script>
    <script src="/assets/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#registerForm").parsley();

        });
    </script>
    @if (Session::has('authregiter_submitted'))
        <script>
            swal("Great Job!","{!! Session::get('eleve_added') !!}","success",{
                button:"OK",
            })
        </script>
    @endif
</body>
</html>
