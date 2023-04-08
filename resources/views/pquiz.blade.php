<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quiz - CCA</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <p></p>
        </div>

        <div class="card-body">
          <h5 class="card-title">
            <input data-toggle="modal" data-target="#tmbsoal" type="button" value="TAMBA SOAL" class="btn btn-success">
            <input data-toggle="modal" data-target="#tmbtim" type="button" value="TEAM" class="btn btn-primary">
          </h5>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>SOAL/PERTANYAAN</th>
                <th>TEAM</th>
                <th>SCORE</th>
                <th>ACTION</th>
              </tr>
            </thead>
          
            <tbody>
              @foreach ($data as $item)
              <tr>  
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->soal }}</td>
                <td>{{ $item->id_tim }}</td>
                <td>{{ $item->nilai}}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $item->id_soal }}">DELETED</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" data-id="{{ $item->id_soal }}">
                     SCORE
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Konten modal-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Quiz</h4>
        </div>
        <div class="modal-body">
           <div class="card-body">
              <div class="container-fluid">
                <div class="row">


                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Team</label>
                      <select class="form-control" id='id_tim'>
                        @foreach($team as $user)
                          <option  value="{{ $user->id_tim }}">{{ $user->nama_team }}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="exampleFormControlSelect1">Score</label>
                    <input hidden type="text" id="id_soal">
                    <input type="number" id="nilai" class="form-control">
                  </div>
                  
                
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Soal</label>
                    <textarea class="form-control" name="" id="soal" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
              </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="update" class="btn btn-success" >UPDATED</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="tmbsoal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Konten modal-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Soal</h4>
        </div>
        <div class="modal-body">
           <div class="card-body">
              <div class="container-fluid">
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Soal</label>
                    <textarea class="form-control" name="" id="addsoal" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
              </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btntamba" class="btn btn-success" >TAMBA</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="tmbtim" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Konten modal-->
      <form id="form-data" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Team</h4>
        </div>

        <div class="modal-body">
           <div class="card-body">
              <div class="container-fluid">
              
           
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Nama Kelompok</label>
                    <input required class="form-control" type="text" name="nama" id="namatim">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">File</label>
                    <input required class="form-control" type="file" name="gambar" id="gambar">
                  </div>
                </div>
            </div>
           

              </div>
           </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btntamba_tim" class="btn btn-success" >TAMBA</button>
        </div>

      </div>
    </form>

    </div>
  </div>

  <script>
     $(document).ready(function () {

      //getdata
      $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);


          $.ajax({
            url: '/api/updated/'+id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
            // Isikan data ke dalam input dalam modal
            modal.find('#soal').val(response.soal);
            modal.find('#team').val(response.id_tim);
            modal.find('#nilai').val(response.nilai);
            modal.find('#id_soal').val(response.id_soal);
        }});

      })//end model

      //updated
      $('#update').click(function(){
        var id = $('#id_soal').val();
        var soal = $('#soal').val();
        var id_tim = $('#id_tim').val();
        var nilai = $('#nilai').val();

          $.ajax({
            type: "POST",
            url: "/api/ubah",
            data: {'id_soal' : id,'soal' : soal,'id_tim':id_tim,'nilai':nilai},
            dataType: "JSON",
            success: function (response) {
              console.log(response);
              if (response.pesan = true) {
                alert("Update Berhasil")
                $('#myModal').modal('hide');
              }else{
                alert("Gagal Update")
              }
            }
          });

      })

      $('#btntamba').click(function(){
        var soal_ = $('#addsoal').val();
          $.ajax({
            type: "POST",
            url: "/api/add",
            data: {'soal' : soal_},
            dataType: "JSON",
            success: function (response) {
              console.log(response);
              if (response.pesan = true) {
                alert("add successfully")
                $('#tmbsoal').modal('hide');
              }else{
                alert("Failed")
              }
            }
          });

      })

      $('.delete-btn').click(function(){
        var ids = $(this).data('id')

          $.ajax({
            type: "POST",
            url: "/api/del",
            data: {'id' : ids},
            dataType: "JSON",
            success: function (response) {
              console.log(response);
              if (response.pesan = true) {
                alert("deleted successfully")
              }else{
                alert("Failed")
              }
            }
          });

      });


      $('#form-data').submit(function(e){
        e.preventDefault(); // Mencegah form submit secara default
        var formData = new FormData(this);
        $.ajax({
          type: "POST",
          url: "/api/addtim",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            console.log(response);
            if (response.pesan = true) {
                alert("add successfully")
                $('#tmbtim').modal('hide');
              }else{
                alert("Failed")
              }
          }
        });
      });


  });
  </script>

</body>
</html>
