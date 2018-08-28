<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach($data as $key => $shop)
		<h2>Shop : {{$shop->name}}</h2>
			<h3>Products :</h3>
			@foreach($shop->products as $product)
				{{$product->name}}<br>
			@endforeach
	@endforeach
</body>
</html>