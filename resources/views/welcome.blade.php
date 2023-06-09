<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Real Time - Score</title>
  </head>
  <body>
    <div class="container text-center py-5">
        <h3>TEAM</h3>
        <h4 class="text-muted">CERDAS CERMAT ALKITAB</h4>
        <p>GKI VIADOLOROSA RC MP72</p>


        <div class="row row-cols-1 row-cols-md-3 g-4 py-0">

            
          @foreach ($score as $item)
          <div class="col">
            <div class="card">
              <img src="assets/img/{{ $item->img}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$item->nama_team }}</h5>
                <p class="card-text"><h1 class="h1">{{$item->total_skor }}</h1><sub>SCORE</sub></p>
              </div>
              {{-- <div class="d-flex justify-content-evenly p-4">
                  <i class="bi bi-facebook"></i>
                  <i class="bi bi-linkedin"></i>
                  <i class="bi bi-envelope-fill"></i>
                  <i class="bi bi-whatsapp"></i>
              </div> --}}
            </div>
          </div>
          @endforeach
            {{-- <div class="col">
              <div class="card">
                <img src="assets/img/user3.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">RAYON II</h5>
                  <p class="card-text"><h1 class="h1">10</h1></p>
                </div>
                <div class="d-flex justify-content-evenly p-4">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-linkedin"></i>
                    <i class="bi bi-envelope-fill"></i>
                    <i class="bi bi-whatsapp"></i>
                </div>
              </div>
            </div> --}}

            {{-- <div class="col">
              <div class="card">
                <img src="assets/img/user3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">RAYON III</h5>
                  <p class="card-text"><h1 class="h1">5</h1></p>
                </div>
                <div class="d-flex justify-content-evenly p-4">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-linkedin"></i>
                    <i class="bi bi-envelope-fill"></i>
                    <i class="bi bi-whatsapp"></i>
                </div>
              </div>
            </div>
          --}}
          </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>