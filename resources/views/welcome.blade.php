@extends('layouts.app')


@section('content')
<div class="jumbotron">
    <h1>Sản phẩm được xem nhiều nhất</h1>
    <ul class="list-products">
        @foreach ($products as $product)
            <li>
                @if (isset($product['images']['edges'][0]['node']['src']))
                <img src="{{ $product['images']['edges'][0]['node']['src'] }}" alt="{{ $product['title'] }}" width="150">
                @else
                <p>No image available</p>
                @endif

                <h2>{{ $product['title'] }}</h2>

                @if (isset($product['metafield']))
                    <h5>Số lượt xem: {{ $product['metafield']['value'] }}</h5>
                @else
                    <h5>Số lượt xem: Không có thông tin!</h5>
                @endif

            </li>
        @endforeach
    </ul>
</div>
@endsection





 
