<!doctype html>
<html lang="en">

    <x-app-layout>
        <x-slot name="header">
        </x-slot>



  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    {{-- <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Keyword" name = "keyword" aria-label="Keyword" aria-describedby="basic-addon1">
                <button class="input-group-text btn btn-primary" id="basic-addon1">Search</button>
            </div>
        </form>
    </div> --}}

    <div class="container mt-5">
        <h1 class="text-center mb-3"> Data pabrik</h1>
        <a href="{{ route('pabrik.create') }}" class="btn btn-primary mb-3"> Tambah Data</a>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tahun Pabrik dibuat</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($pabriks as $no => $hasil)
                            <tr>
                                <th>{{ $no+1 }}</th>
                                <th>{{ $hasil-> nama_pabrik }}</th>
                                <td>{{ $hasil-> lokasi }}</td>
                                <td>{{ $hasil-> tahun_pabrik_dibuat }}</td>
                                <td>
                                    <form action="{{ route('pabrik.destroy', $hasil->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href=" {{ route('pabrik.edit', $hasil->id) }}" class="btn btn-success btn-sm"> Edit</a>
                                        <button class="btn btn-danger btn">Perma Delete</button>
                                        <form class = "mt-1 form-inline" method="POST" action="{{ route('pabrik.soft', $hasil->id) }}">
                                            @csrf
                                                <button onclick="return confirm('{{ __('Rilkah min?') }}')" type="submit" class="btn btn-warning">Delete</button>
                                        </form>

                                    </form>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

</x-app-layout>
