<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Ajax CRUD</title>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h3">
                            <span class="text-primary">Liste des étudiants</span>
                            <a  class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#etudiantModal">Ajouter un nouveau étudiant</a>
                            <a  class="btn btn-danger btn-sm float-right mr-2" id="deleteAllSelectedRecord">Supprimer la sélection</a>

                        </div>
                        <div class="card-body">
                            {{-- @if (Session::has('post_created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('post_created') }}
                                </div>

                            @endif --}}
                            <table id="etudiantTable" class="table table-sm table-striped  table-hover">
                                <thead>
                                    @php
                                        $i=1;
                                    @endphp
                                  <tr>
                                    <th scope="col"><input type="checkbox" name="chkCheckAll" id="chkCheckAll"></th>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Actions</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($etudiants as $etudiant)
                                    <tr id="sid{{ $etudiant->id }}">
                                        <td><input type="checkbox" name="ids" id="ids" class="checkBoxClass" value="{{ $etudiant->id }}"></td>
                                        <td scope="row">@php echo $i++; @endphp</td>
                                        <td>{{ $etudiant->firstname }}</td>
                                        <td>{{ $etudiant->lastname }}</td>
                                        <td>{{ $etudiant->email }}</td>
                                        <td>{{ $etudiant->phone }}</td>
                                        <td>
                                            <a href="" class="btn  btn-info btn-sm">View</a>
                                            <a href="javascript:void(0)" onclick="editerEtudiant({{ $etudiant->id }})" class="btn  btn-warning btn-sm">Edit</a>
                                            <a href="javascript:void(0)" onclick="deleteEtudiant({{ $etudiant->id }})" class="btn  btn-danger btn-sm">Delete</a>
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

  <!-- Ajout d'étudiant Modal -->
  <div class="modal fade" id="etudiantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau étudiant</h5>
          <span type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </span>
        </div>
        <div class="modal-body">
          <form  id="etudiantForm">
              @csrf
            <div class="form-group">
                <label for="firstname">Nom</label>
                <input id="firstname" class="form-control" type="text" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Prénom</label>
                <input id="lastname" class="form-control" type="text" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input id="phone" class="form-control" type="number" name="phone">
            </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

            <button class="btn btn-sm btn-primary float-right" type="submit">Enregistrer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    <!-- Editer un étudiant Modal -->
    <div class="modal fade" id="etudiantEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editer un étudiant</h5>
              <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </span>
            </div>
            <div class="modal-body">
              <form  id="etudiantEditForm">
                  @csrf
                  <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="firstname2">Nom</label>
                    <input id="firstname2" class="form-control" type="text" name="firstname2">
                </div>
                <div class="form-group">
                    <label for="lastname2">Prénom</label>
                    <input id="lastname2" class="form-control" type="text" name="lastname2">
                </div>
                <div class="form-group">
                    <label for="email2">Email</label>
                    <input id="email2" class="form-control" type="email" name="email2">
                </div>
                <div class="form-group">
                    <label for="phone2">Téléphone</label>
                    <input id="phone2" class="form-control" type="number" name="phone2">
                </div>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

                <button class="btn btn-sm btn-primary float-right" type="submit">Enregistrer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>
        $('#etudiantForm').submit(function(e) {
            e.preventDefault();
            let firstname= $('#firstname').val();
            let lastname= $('#lastname').val();
            let email= $('#email').val();
            let phone= $('#phone').val();
            let _token= $('input[name=_token]').val();

            $.ajax({
                url:"{{ route('etudiant.ajout') }}",
                type:"POST",
                data:{
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function (response)
                {
                    if (response)
                    {
                        $("#etudiantTable tbody").prepend('<tr><td></td><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>');
                        $("#etudiantForm")[0].reset();
                        $("#etudiantModal").modal('hide');
                    }
                }

            });
        });
    </script>
    <script>
        function editerEtudiant(id) {
            $.get('/etudiants/'+id, function name(etudiant) {
                $("#id").val(etudiant.id);
                $("#firstname2").val(etudiant.firstname);
                $("#lastname2").val(etudiant.lastname);
                $("#email2").val(etudiant.email);
                $("#phone2").val(etudiant.phone);
                $('#etudiantEditModal').modal('toggle');

            })
        }
        $('#etudiantEditForm').submit(function(e) {
            e.preventDefault();
            let id= $('#id').val();
            let firstname= $('#firstname2').val();
            let lastname= $('#lastname2').val();
            let email= $('#email2').val();
            let phone= $('#phone2').val();
            let _token= $('input[name=_token]').val();

            $.ajax({
                url:"{{ route('etudiant.update') }}",
                type:"PUT",
                data:{
                    id:id,
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function (response)
                {
                    $('tr#sid' + response.id +' td:nth-child(2)').text(response.firstname);
                    $('tr#sid' + response.id +' td:nth-child(3)').text(response.lastname);
                    $('tr#sid' + response.id +' td:nth-child(4').text(response.email);
                    $('tr#sid' + response.id +' td:nth-child(5)').text(response.phone);
                    $('#etudiantEditModal').modal('toggle');
                    $('#etudiantEditForm')[0].reset();

                }

            });
        });
    </script>
    <script>
        function deleteEtudiant(id) {
            if (confirm("Voulez-vous vraiment supprimer?"))
            {
                $.ajax({
                    url:'/etudiants/'+id,
                    type:"DELETE",
                    data:{
                        _token: $('input[name=_token]').val()
                    },
                    success:function (response)
                    {
                        $("#sid"+id).remove();
                    }
                })
            }
        }
    </script>
    <script>
        $(function(e) {
            $("#chkCheckAll").click(function() {
                $(".checkBoxClass").prop('checked',$(this).prop('checked'));
            });
            $('#deleteAllSelectedRecord').click(function (e) {
                e.preventDefault();
                var allids=[];
                $("input:checkbox[name=ids]:checked").each(function() {
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{ route('etudiant.deleteSelected') }}",
                    type:"DELETE",
                    data:{
                        _token: $('input[name=_token]').val(),
                        ids:allids
                    },
                    success:function (response) {
                        $.each(allids,function(key,val) {
                            $("#sid"+val).remove();
                        })
                    }
                });
            });
        });
    </script>
</body>
</html>
