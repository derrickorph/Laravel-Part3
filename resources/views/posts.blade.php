<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>All~Post</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3">
                            <span class="text-primary">All Post</span>
                            <a href="/add-post" class="btn btn-success btn-sm float-right">Add New Post</a>
                        </div>
                        <div class="card-body">
                            @if (Session::has('post_deleted'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('post_deleted') }}
                                </div>
                            @endif
                            <table class="table table-sm table-striped  table-hover">
                                <thead>
                                    @php
                                        $i=1;
                                    @endphp
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Post Description</th>
                                    <th scope="col">Actions</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">@php echo $i++; @endphp</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ Str::substr($post->body, 0, 100) }}</td>
                                        <td>
                                            <a href="/posts/{{ Crypt::encrypt($post->id) }}" class="btn  btn-info btn-sm">View</a>
                                            <a href="/edit-post/{{ Crypt::encrypt($post->id) }}" class="btn  btn-warning btn-sm">Edit</a>
                                            <a href="/delete-post/{{ Crypt::encrypt($post->id) }}" class="btn  btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                  @endforeach
                                <tbody>
                            </table>

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
