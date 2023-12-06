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
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $item->price }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $item->category }}</p>
                            <p class="card-text"><strong>publish date:</strong> {{ $item->created_at }}</p>
                            <!-- alleen admin -->
                            @if(Auth::user()->role=='admin')
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editItemModal{{$item->id}}">
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
                            <h5 class="modal-title" id="editItemModalLabel{{$item->id}}">Edit Item</h5>
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

        <!-- itemlist van alle items geconsole logged, later dit gebruiken voor filter feature -->
        <script>
            var itemList = @json($itemList);
            console.log(itemList);
        </script>
    
    </div>
</div>

<style>
    body {
        background-image: url('{{ asset('images/webshop.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    html, body {
        height: 120vh;
    }
</style>


@endsection