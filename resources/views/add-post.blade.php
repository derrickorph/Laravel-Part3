<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Add~Post</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header h3">Add Post</div>
                        <div class="card-body">
                            @if (Session::has('post_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('post_created') }}
                                </div>

                            @endif
                            <form action="{{ route('post.create') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="body">Post Body</label>
                                    <textarea name="body" id="body" class="form-control" rows="3"></textarea>
                                </div>
                                <a href="/posts" class="btn btn-sm btn-primary">Back</a>
                                <button type="submit" class="btn btn-success btn-sm float-right">Add Post</button>
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
