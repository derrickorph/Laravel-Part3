<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Multi Step Form</title>
    <style>
        section{
            padding-top:100px
        }
        .form-section{
            padding-left: 15px;
            display: none
        }
        .form-section.current{
            display: inherit;
        }
        .btn-info, .btn-success, .btn-danger{
            margin-top: 10px;
        }
        .parsley-errors-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
</head>
<body>
    <section >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3 text-white bg-info">Multi Step Form</div>
                        <div class="card-body">

                            <form class="contact-form" method="POST" action="{{ route('stepform.submit') }}">
                                @csrf
                                <div class="form-section">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" id="firstname"  class="form-control" required>

                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" id="lastname"  class="form-control" required>
                                </div>
                                <div class="form-section">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email"  class="form-control" required>

                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" id="phone"  class="form-control" required>
                                </div>
                                <div class="form-section">
                                    <label for="msg">Message</label>
                                    <textarea name="msg" id="msg" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-navigation ">
                                    <button type="button" class="previous btn btn-info float-left btn-sm">Previous</button>
                                    <button type="button" class="next btn btn-danger float-right btn-sm">Next</button>
                                    <button type="submit" class="next btn btn-success float-right btn-sm">Enregistrer</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <script>
        $(function() {
            var $sections= $('.form-section');
            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd= index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            };
            function curIndex()
            {
                return $sections.index($sections.filter('.current'));
            };

            $('.form-navigation .previous').click(function () {
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click(function() {
                $('.contact-form').parsley().whenValidate({
                    group:'block-' + curIndex()
                }).done(function () {
                    navigateTo(curIndex()+1);
                });
            });

            $sections.each(function(index,section) {
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });
            navigateTo(0);
        });
    </script>
</body>
</html>
