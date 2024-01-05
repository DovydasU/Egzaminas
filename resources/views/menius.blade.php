<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Meniu Page</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">{{ $meniu_list->name }} Meniu</h2>

    <!-- Meniu Details -->
    <p>Description: {{ $meniu_list->description }}</p>

    <!-- Products List -->
    <h3 class="mt-4">Products</h3>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }}</li>
            <li><img src="{{ asset('images/product/' . $product->image) }}" style="max-width: 50px; max-height: 50px;"></li>
            <li>{{ $product->price }}</li>
            <li>{{ $product->description }}</li>
            <br>
            <br>
        @endforeach
    </ul>

    <a href="{{ route('restaurants') }}" class="btn btn-secondary mt-3">Gryžti atgal</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
