@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: white;">Your Inventory</h1>

        @if($items->isNotEmpty())
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $inventory)
                        <tr>
                            <td>
                                <img src="{{ asset($inventory->item->image) }}" alt="{{ $inventory->item->name }}" class="mini-image">
                            </td>
                            <td>{{ $inventory->item->name }}</td>
                            <td>{{ $inventory->item->description }}</td>
                            <td>{{ $inventory->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: white;">Your inventory is empty go and buy something from the shop!</p>
        @endif
    </div>
    <style>
        body {
            background-image: url('{{ asset('storage/images/inventory.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    #myTable {
        width: 65%;
    }
    .table {
        border-radius: 10px;
        overflow: hidden; 
    }

    .mini-image {
        width: 50px;
        height: auto;
    }
</style>
@endsection
