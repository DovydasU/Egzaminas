<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Restaurant List</title>
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
                    <li><a href="#">Produktai</a></li>
                    <li><a href="{{ route('orders.index') }}">Užsakymai</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1>Restaurant List</h1>

        <a href="{{ route('restaurants.create') }}">Create Restaurant</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Working Time</th>
                    <th>Closing Time</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>
                            @if($restaurant->image)
                                <img src="{{ asset('images/restaurants/' . $restaurant->image) }}" style="max-width: 100px; max-height: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $restaurant->working_time }}</td>
                        <td>{{ $restaurant->closing_time }}</td>
                        <td>{{ $restaurant->description }}</td>
                        <td>
                            <a href="{{ route('restaurants.edit', $restaurant->id) }}">Edit</a>
                            <form method="POST" action="{{ route('restaurants.destroy', $restaurant->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
