<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">

        <style>
            /* Style for product details page */
.container {
margin-top: 50px;
}

.img-fluid {
max-width: 100%;
height: auto;
}

h1 {
font-size: 36px;
font-weight: bold;
margin-bottom: 20px;
}

p {
font-size: 18px;
margin-bottom: 10px;
}
.product-description {
    white-space: pre-line;
}
.form-group {
margin-bottom: 20px;
}

label {
font-size: 18px;
font-weight: bold;
display: block;
margin-bottom: 5px;
}

input[type="number"] {
width: 100px;
display: inline-block;
vertical-align: middle;
margin-right: 10px;
}

button[type="submit"] {
display: block;
margin-top: 20px;
}
        </style>
    </head>
    <body>
    
        <x-header />

        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p>Price: RM {{ $product->price }}</p>
                <p>Stock Available: {{ $product->quantity }}</p>
                <form action="{{ route('add_cart') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control">
                    </div>
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Add to Cart</button>
                </form>
            </div>
            </div>
        </div>
    </body>
</html>