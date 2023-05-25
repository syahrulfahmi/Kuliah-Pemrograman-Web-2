<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <h1>Hello, world!</h1>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/siswa/create" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama_depan">Nama Depan</label>
              <input type="text" class="form-control" name="nama_depan" id="nama_depan" aria-describedby="nama_depan" placeholder="Nama Depan">
            </div>
            <div class="form-group">
              <label for="nama_belakang">Nama Belakang</label>
              <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" aria-describedby="nama_belakang" placeholder="Nama Belakang">
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="agama">Agama</label>
              <input type="text" class="form-control" name="agama" id="agama" aria-describedby="nama_depan" placeholder="Agama">
            </div> 
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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