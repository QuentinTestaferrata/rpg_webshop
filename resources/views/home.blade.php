@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="text-end">
                    <!-- Filter voor iedereen en create voor admins-->
                    <div class="dropdown">

                        @if(Auth::user()->role=='admin')
                        <a href="{{ route('create_item') }}" class="btn btn-primary">Create</a> 
                        @endif

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                            <li class="px-3">
                                <input type="radio" name="category" id="all" class="form-check-input" checked>
                                <label for="all" class="form-check-label">All</label>
                            </li>
                            <li class="px-3">
                                <input type="radio" name="category" id="Armor" class="form-check-input">
                                <label for="Armor" class="form-check-label">Armor</label>
                            </li>
                            <li class="px-3">
                                <input type="radio" name="category" id="Sword" class="form-check-input">
                                <label for="Sword" class="form-check-label">Swords</label>
                            </li>
                            <li class="px-3">
                                <input type="radio" name="category" id="Wand" class="form-check-input">
                                <label for="Wand" class="form-check-label">Wands</label>
                            </li>
                            <li class="px-3">
                                <input type="radio" name="category" id="Staff" class="form-check-input">
                                <label for="Staff" class="form-check-label">Staffs</label>
                            </li>
                            <li class="px-3">
                                <input type="radio" name="category" id="Potion" class="form-check-input">
                                <label for="Potion" class="form-check-label">Potions</label>
                            </li>
                            <li class="px-3">
                                <input type="radio" name="category" id="Adventure kit" class="form-check-input">
                                <label for="Adventure_kit" class="form-check-label">Adventure Kits</label>
                            </li>
                        </ul>
                    </div>                 
                </div>
            </div>

            @php
            $selectedCategory = request('category', 'all');
        @endphp

        @foreach($items as $item)
            <div class="col-md-3 mb-4">
                @if (($selectedCategory == 'all') || ($item->category == 'Armor' && $selectedCategory == 'Armor'))
                    <div class="item-card">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="card-img-top">
                        <div class="card-body" style="padding: 10px;">
                            <h5 class="card-title"><strong>{{ $item->name }}</strong></h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $item->price }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $item->category }}</p>
                            <p class="card-text"><strong>publish date:</strong> {{ $item->created_at }}</p>
                            <!-- alleen admin -->
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buyItemModal{{$item->id}}">
                                Buy
                            </button>
                            @if(Auth::user()->role=='admin')
                                <button class="btn btn-danger justify-content-end" data-bs-toggle="modal" data-bs-target="#editItemModal{{$item->id}}">
                                    Edit
                                </button>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            @php
                $itemList[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'price' => $item->price,
                    'category' => $item->category,
                    'image' => asset($item->image),
                ];
            @endphp
            <!-- Edit modal for adminsc -->
            @if(Auth::user()->role=='admin')
                <div class="modal fade" id="editItemModal{{$item->id}}" tabindex="-1" aria-labelledby="editItemModalLabel{{$item->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editItemModalLabel{{$item->²²id}}">Edit Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to edit this item?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <!-- Redirect naar edit page met item id -->
                                <a href="{{ url('/edit/' . $item->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        @foreach($items as $item)

        @php
            $user = Auth::user();
        @endphp

            <div class="modal fade" id="buyItemModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="buyItemModalLabel{{$item->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="buyItemModalLabel{{$item->id}}">Confirm Purchase</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                    <p>Are you sure you want to buy {{ $item->name }}?</p>
                    @php
                        $newBalance = $user->balance - ($item->price * 1); 
                        $balanceColor = $newBalance < 0 ? 'red' : 'green';
                    @endphp
                    <form method="post" action="{{ route('purchase', ['item_id' => $item->id]) }}">
                        @csrf
                        <label for="quantity{{$item->id}}" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity{{$item->id}}" name="quantity" value="1" min="1" onchange="updateDetails({{$item->price}}, {{$user->balance}}, {{$item->id}})">
                    
                    <p class="total"><strong>Total Price:</strong> $<span id="totalPrice{{$item->id}}">{{$item->price}}</span></p>

                    <p><strong>User Balance:</strong> ${{ $user->balance }}</p>
                    <hr>
                    <p>
                        <strong>New User Balance:</strong> 
                        <span id="newBalance{{$item->id}}" style="color: {{ $balanceColor }}"><strong>{{ $newBalance }}$</strong></span>
                    </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form method="post" action="{{ route('purchase', ['item_id' => $item->id]) }}">
                            @csrf
                            <button id="buyButton{{$item->id}}" type="submit" class="btn btn-primary" @if($newBalance < 0) disabled @endif>Buy</button>

                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<script>
    function updateDetails(itemPrice, initialBalance, itemId) {
    var quantity = parseInt(document.getElementById('quantity' + itemId).value);

    var totalPrice = itemPrice * quantity;

    document.getElementById('totalPrice' + itemId).innerText = totalPrice;

    var newBalance = initialBalance - totalPrice;

    var initialColor = newBalance < 0 ? 'red' : 'green';

    document.getElementById('newBalance' + itemId).innerHTML = '<strong>' + newBalance + '$</strong>';
    document.getElementById('newBalance' + itemId).style.color = initialColor;

    var buyButton = document.getElementById('buyButton' + itemId);
    if (newBalance < 0 || quantity <= 0) {
        buyButton.setAttribute('disabled', 'disabled');
    } else {
        buyButton.removeAttribute('disabled');
    }
}

</script>
    
<style>
    body {
        background-image: url('{{ asset('storage/images/webshop.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    html, body {
        height: 100%;
    }
    hr {
        width: 40%;
    }
    .total{
        padding-top: 30px;
    }
</style>
@endsection