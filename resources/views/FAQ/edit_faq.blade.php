@extends('layouts.app')

@section('content')
    
    <div class="container">
        
        <div class="row">
            
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
            <div class="col">
                <h2 style="color: white;">Categories:</h2>
                <a class="btn btn-primary" href="{{ route('home') }}">
            Back
        </a>
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
        <h2 style="color: white;">Edit FAQ Items</h2>

        @foreach($categories as $category)
            <h3 style="color: white;">{{ $category->name }}</h3>
            @foreach($category->faqItems as $faqItem)
                <div class="mb-3">
                    <form method="POST" action="{{ route('update_faq_item', ['id' => $faqItem->id]) }}" class="d-inline">
                        @csrf
                        @method('PUT')
                        <strong style="color: white;">Q:</strong>
                        <input type="text" name="question"  value="{{ $faqItem->question }}" required>
                        <br>
                        <strong style="color: white;">A:</strong>
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
                    <strong style="color: white;">Q:</strong>
                    <input type="text" name="new_question" required>
                    <br>
                    <strong style="color: white;">A:</strong>
                    <textarea name="new_answer" rows="2" required></textarea>
                    <button type="submit" class="btn btn-success btn-sm">Add Item</button>
                    
                </form>
            </div>
            <hr>
           
        @endforeach
       
    </div>

    <style>
        body {
            background-image: url('{{ asset('storage/images/night.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        html,
        body {
            height: 100vh;
        }
    </style>
@endsection
