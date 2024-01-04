@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store_item') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Item Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">{{ __('Category') }}</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="Armor">Armor</option>
                                    <option value="Sword">Sword</option>
                                    <option value="Wand">Wand</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Potion">Potion</option>
                                    <option value="Adventure Kit">Adventure Kit</option>
                                </select>
                            </div>
                    
                            <div class="mb-3">
                                <label for="price" class="form-label">{{ __('Price') }}</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('Upload Picture (.jpg)') }}</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Create Item') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
