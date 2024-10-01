<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <div class="max-w-xl mx-auto mt-10">
        <h1 class="text-xl font-bold mb-4">Insert Rent</h1>
        <form action="{{ route('rent.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="customer_id" class="block text-gray-700">Customer:</label>
                <select id="customer_id" name="customer_id" class="border rounded p-2 w-full" required>
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->full_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="movie_id" class="block text-gray-700">Movie:</label>
                <select id="movie_id" name="movie_id" class="border rounded p-2 w-full" required>
                    <option value="">Select Movie</option>
                    @foreach($movies as $movie)
                        <option value="{{ $movie->movie_id }}">{{ $movie->movie_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="address_id" class="block text-gray-700">Address:</label>
                <select id="address_id" name="address_id" class="border rounded p-2 w-full" required disabled>
                    <option value="">Select Address</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white rounded p-2">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#customer_id').change(function() {
                var customerId = $(this).val();
                $('#address_id').prop('disabled', true).empty().append('<option value="">Select Address</option>');

                if (customerId) {
                    $.get('/addresses/' + customerId, function(data) {
                        console.log(data); // Debugging
                        $('#address_id').prop('disabled', false);
                        $.each(data, function(index, address) {
                            $('#address_id').append('<option value="' + address.address_id + '">' + address.address + '</option>');
                        });
                    }).fail(function() {
                        console.error("Error retrieving addresses"); // Error handling
                    });
                }
            });
        });
    </script>
</body>

</html>
