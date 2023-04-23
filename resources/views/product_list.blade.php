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
			.card {
				border: 1px solid #ccc;
				border-radius: 8px;
				box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
				margin-top: 15px;
				text-align: center;
				margin-bottom: 20px;
			}

			.card-image {
				max-width: 70%;
				height: auto;
				object-fit: cover;
				position:relative;
			}

			.card:hover {
				box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
			}

			.card-img-top {
				object-fit: cover;
				height: 0; 
				padding-top: 75%; 
				position:relative;
			}

			.card-title {
				font-size: 18px;
				font-weight: bold;
				width: 100%;
				height: auto;
				height: 60px; /* set a fixed height for the title */
				overflow: hidden; /* hide overflow text */		
			}

			.card-text {
				font-size: 16px;
				overflow: hidden; /* hide overflow text */
				text-overflow: ellipsis; /* add ellipsis if text is too long */
			}

			.btn-primary {
				background-color: #007bff;
				border-color: #007bff;
				font-size: 16px;
				font-weight: bold;
				margin-bottom: 20px;
			}

			.btn-primary:hover {
				background-color: #0069d9;
				border-color: #0062cc;
			} 
		</style>
    </head>
    <body>
    <x-header />
	@if ($products->count() > 0)
	<div class="container">
		<div class="row">
			@foreach($products as $product)
		 	 <!--	sm is for small screen
		  			md is for medium screen -->
		  	<div class="col-sm-4 col-md-4">
				<div class="card">
					<img src="{{ asset($product->image)}}" class="card-image" alt="{{$product->name}}">
					<div class="card-body">
				  		<h5 class="card-title">{{ $product->name }}</h5>
				  		<p class="card-text"><strong>Price:</strong> RM{{ $product->price }}</p>
				  		<a href="{{ route('product_detail', $product->id) }}" class="btn btn-primary">View Details</a>
					</div>
			  	</div>
			</div>
			@endforeach	
		</div>
	</div>
	@endif
</body>
</html>