@extends('admin.layouts.master')

@section('title')
    Views Products : {{ $product->name }}
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Img</th>
            <th>Catalogue</th>
            <th>Price Regular</th>
            <th>Price Sale</th>
            <th>Views</th>
        </tr>
        <tr>
            <td>{{ $product->name }}</td>
            <td>
                <img src="{{ asset('/storage/' . $product->img_thumbnail) }} " alt="" height="150">
            </td>
            <td>{{ $product->catalogue?->name }}</td>
            <td>{{ $product->price_regular }}</td>
            <td>{{ $product->price_sale }}</td>
            <td>{{ $product->views }}</td>
        </tr>
    </table>
@endsection
