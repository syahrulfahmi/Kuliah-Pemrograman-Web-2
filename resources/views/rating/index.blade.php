<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <!-- Button trigger modal -->
  <button type="button"  class="btn btn-primary" style="" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Survey Anda
  </button>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h3>Data Siswa</h3>
      </div>
      <div class="col-6">
        <!-- Button trigger modal -->
      </button>
    </div>
    <table class="table table-hover">
      <tr>
        <th>Nama</th>
        <th>jenis_kelamin</th>
        <th>umur</th>
        <th>makanan_daerah</th>
        <th>rating</th>
      </tr>
      @foreach($data_rating as $rating)
      <tr>
        <th>{{$rating->nama}}</th>
        <th>{{$rating->Jenis_kelamin}}</th>
        <th>{{$rating->umur}}</th>
        <th>{{$rating->makanan_daerah}}</th>
        <th>{{$rating->rating}}</th>
      </tr>
      @endforeach
      
      <!-- Modal -->
      <div class="modal-fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/rating/create" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="nama">
                </div>
                <div class="form-group">
                  <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                  <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" name="umur" id="umur" aria-describedby="umur" placeholder="umur">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="makanan_daerah">Makanan</label>
                  <select class="form-control" name="makanan_daerah" id="makanan_daerah">
                    <option value="Soto">Soto</option>
                    <option value="Nasi goreng">Nasi goreng</option>
                    <option value="Nasi padang">Nasi padang</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="makanan_dearah">makanan daerah</label>
                  <input type="text" class="form-control" name="makanan_dearah" id="makanan_dearah" aria-describedby="makanan_dearah" placeholder="makanan_dearah">
                </div>
                <div class="form-group">
                  <label for="rating">Rating</label>
                  <input type="text" class="form-control" name="rating" id="rating" aria-describedby="rating" placeholder="rating">
                </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
        
        <script>
          const myModal = document.getElementById('myModal')
          const myInput = document.getElementById('myInput')
          
          myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
          })
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      </body>
      </html>