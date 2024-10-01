<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Document</title>
</head>

<body>
    <div class="flex h-10 bg-gray-400 items-center justify-center">
        <a class="w-full hover:text-blue-500" href="/" class="text-black hover:text-blue-500">
            <div class="w-full text-center">
                View Rent
            </div>
        </a>
        <a class="w-full hover:text-blue-500" href="/insert" class="text-black hover:text-blue-500">
            <div class="w-full text-center">
                Insert Rent
            </div>
        </a>
    </div>
    <div class="flex text-center items-center justify-center flex-col">
        <h1>Daftar Customers</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Salutation</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Movie Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rents as $rent)
                    <tr>
                        <td>{{ $rent->salutation }}</td>
                        <td>{{ $rent->full_name }}</td>
                        <td>{{ $rent->address }}</td>
                        <td>{{ $rent->movie_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
