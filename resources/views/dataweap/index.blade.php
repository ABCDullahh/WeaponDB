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

    <div class="py-12">
        <div class="mb-4 px-4">
            <form class = "row mt-3 ml-3 justify-content-center "action="" method="GET">
                <h2 class="text-center mb-1">Search</h2>
                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                <input class="w-50" type="text" name="search"/>
                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
            </form>
        </div>

    <div class="container mt-5">
        <h1 class="text-center mb-3"> Pabrik Weapon</h1>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Weapon Name</th>
                            <th>Type</th>
                            <th>Nama Pabrik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($joins as $join)
                        <tr>
                            <td>{{ $join->weapname }}</td>
                            <td>{{ $join->type }}</td>
                            <td>{{ $join->nama_pabrik }}</td>
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
