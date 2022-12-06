<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>


    <div class="container mt-5">
        <h1 class="text-center mb-3"> Data Weapon</h1>
        <a href="{{ route('weapon.store') }}" class="btn btn-primary mb-3"> Data</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('weapon.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="weapname" class="form-label">Name</label>
                        <input type="text" class="form-control" name="weapname" id="weapname">
                    </div>
                    <div class="mb-3">
                        <label for="ammo" class="form-label">Ammo</label>
                        <input type="text" class="form-control" name="ammo" id="ammo">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" id="type">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="nama_pabrik" class="form-label">Nama Pabrik</label>
                        <input type="text" class="form-control" name="nama_pabrik" id="nama_pabrik">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                <form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
