<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Restaurant Page</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Restaurant Information</h2>

    <!-- Restaurant Boxes -->
    <div class="row">
        @foreach ($res_list as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="images/restaurants/{{ $item->image }}" class="card-img-top" alt="{{ $item->name }} Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <a href="{{ route('menius', ['id' => $item->id]) }}" class="btn btn-primary">Meniu ir Produktai</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
