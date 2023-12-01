@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update_item', ['id' => $item->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Item Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">{{ __('Category') }}</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ $item->category }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">{{ __('Price') }}</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $item->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('Upload Picture') }}</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update Item') }}</button>
                        </form>
                        <form method="POST" action="{{ route('delete_item', ['id' => $item->id]) }}" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                {{ __('Delete Item') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
