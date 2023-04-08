<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
    <div class="contarner-fluid">

       <div class="card">
            <div class="card-header">
                    <p>Hello</p>
            </div>

            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
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
                                <button type="button" class="btn btn-danger">Left</button>
                                <button type="button" class="btn btn-warning">Middle</button>
                                <button type="button" class="btn btn-success">Right</button>
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