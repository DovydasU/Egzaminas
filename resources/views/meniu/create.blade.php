<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Restaurant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="time"],
        textarea {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 100px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Create Meniu</h1>

        <form method="POST" action="{{ route('meniu.store') }}">
            @csrf

            <div>
                <label for="restaurants_id">Restaurants ID</label>
                <input type="number" id="restaurants_id" name="restaurants_id" required>
            </div>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <button type="submit">Create Meniu</button>
        </form>
    </div>

</body>

</html>
