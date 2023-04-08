<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RMSD</title>

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
          <h5 class="card-title"><input type="button" value="TAMBA SOAL" class="btn btn-success"></h5>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>SOAL</th>
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
                    <button type="button" class="btn btn-danger">DELETED</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="{{ $item->id_soal }}">
                     UPDATED
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
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                        <option>Option 4</option>
                        <option>Option 5</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="exampleFormControlSelect1">Score</label>
                    <input type="text" id="id_soal">
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

  <script>
     $(document).ready(function () {

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

      $('#update').click(function(){
        var id = $('#id_soal').val();
        var soal = $('#soal').val();
        var id_tim = $('#id_tim').val();
        var nilai = $('#nilai').val();

        $.ajax({
          type: "POST",
          url: "/api/ubah/",
          data: {'id_soal' : id,'soal' : soal,'id_tim':id_tim,'nilai':nilai},
          dataType: "JSON",
          success: function (response) {
            // console.log(response);
            if (response.pesan = true) {
              alert("Update Berhasil")
            }else{
              alert("Gagal Update")
            }
          }
        });

      })



       
      })//end model

      });
  </script>

</body>
</html>
