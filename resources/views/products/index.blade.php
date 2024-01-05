<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #f2f2f2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 60px;
            /* Adjust based on header height */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 4px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            background-color: #4CAF50;
            transition: background-color 0.3s;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <h1>Admin Header</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('restaurants.index') }}">Isteigos</a></li>
                    <li><a href="{{ route('meniu.index') }}">Valgiaraštis</a></li>
                    <li><a href="{{ route('products.index') }}">Produktai</a></li>
                    <li><a href="{{ route('orders.index') }}">Užsakymai</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container mt-5">
        <h1>Products</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->active ? 'Yes' : 'No' }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('images/product/' . $product->image) }}" style="max-width: 50px; max-height: 50px;">
                            @else
                                No Image
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
