<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <title>Employees</title>
    <style>
        #emp tr:nth-child(even){
            background-color: #0bfdfd;
        }
    </style>
</head>
<body>

    <section style="padding-top:60px">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3">
                            <span class="text-primary">All Employees</span>
                            <a href="/download-pdf" class="btn btn-success btn-sm float-right">Download PDF</a>

                        </div>
                        <div class="card-body">

                            <table id="emp"class="table table-striped  table-sm  " style="width: 100%">
                                <thead>
                                    @php
                                        $i=1;
                                    @endphp
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <th scope="row">@php echo $i++; @endphp</th>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ $employee->department }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
