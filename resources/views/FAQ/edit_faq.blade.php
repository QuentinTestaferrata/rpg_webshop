@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Categories:</h2>
            </div>
            <div class="col text-right">
                <form method="POST" action="{{ route('add_category') }}" class="form-inline">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                        <button type="submit" class="btn btn-primary mb-2">Add Category
                            <input type="text" class="form-control" id="categoryInput" name="category_name" placeholder="Enter category name" required>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @foreach($categories as $category)
            <div class="row" style="margin-left: 20px;">
                <div class="col">
                    <form method="POST" action="{{ route('update_faq_category', ['id' => $category->id]) }}" class="d-inline">
                        @csrf
                        @method('PUT')
                        <textarea name="name" rows="1" required>{{ $category->name }}</textarea>                    
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                </div>
                <div class="col">
                    <form method="POST" action="{{ route('delete_category', ['id' => $category->id]) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                            {{ __('Delete Category') }} '{{$category->name}}'
                        </button>
                    </form>
                </div>
            </div>
        @endforeach


    
    <div class="container">
        <h2>Edit FAQ Items</h2>

        @foreach($categories as $category)
            <h3>{{ $category->name }}</h3>
            @foreach($category->faqItems as $faqItem)
                <div class="mb-3">
                    <form method="POST" action="{{ route('update_faq_item', ['id' => $faqItem->id]) }}" class="d-inline">
                        @csrf
                        @method('PUT')
                        <strong>Q:</strong>
                        <input type="text" name="question"  value="{{ $faqItem->question }}" required>
                        <br>
                        <strong>A:</strong>
                        <textarea name="answer" rows="2" required>{{ $faqItem->answer }}</textarea>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>

                    <form method="POST" action="{{ route('delete_faq_item', ['id' => $faqItem->id]) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ item?')">Delete</button>
                    </form>
                </div>
            @endforeach
            <div class="mb-3">
                <form method="POST" action="{{ route('add_faq_item', ['category_id' => $category->id]) }}">
                    @csrf
                    <strong>Q:</strong>
                    <input type="text" name="new_question" required>
                    <br>
                    <strong>A:</strong>
                    <textarea name="new_answer" rows="2" required></textarea>
                    <button type="submit" class="btn btn-success btn-sm">Add Item</button>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
