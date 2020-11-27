<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Search Product</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3">Search Product</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="" id="" class="form-control typeahead" placeholder="Search...">
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
    <script src="/assets/bootstrap3-typeahead.min.js"></script>
    <script>
        var path= "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:function (terms,process) {
                return $.get(path,{terms:terms},function (data) {
                    return process(data);
                });
            }
        })
    </script>

</body>
</html>
