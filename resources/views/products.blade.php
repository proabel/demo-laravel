<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="container mx-auto">
            <h1 class="font-bold p-4">Products</h1>
            <div class="flex flex-wrap">
                @foreach ($products as $product)
                <div class="w-[240px] p-4">
                <div class="w-]100px] h-[100px] bg-stone-200 rounded"></div>
                <p>{{ $product->name }} <br> <span class="font-semibold text-slate-700">${{$product->price}}<span></p>
                <form action="/checkout" method="POST">
                    <input name="name" type="hidden" value="{{$product->name}}">
                    <input name="description" type="hidden" value="{{$product->description}}">
                    <input name="price" type="hidden" value="{{$product->price}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button class="rounded bg-slate-700 px-3 py-1 text-white" type="submit">Buy</button>
                </form>
                </div>
                @endforeach
            </div>
                
        </div>
    </body>
</html>
