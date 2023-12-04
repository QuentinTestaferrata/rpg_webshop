@extends('layouts.app')

@section('content')

    @if(Auth::user()->role=='admin')    
    <a href="{{ route('create_item') }}" class="btn btn-primary">Add Category</a> 
    <a href="{{ route('create_item') }}" class="btn btn-primary">Add FAQ item</a>
    @endif


    <div class="container">
        @foreach($categories as $category)
            <h2>{{ $category->name }}</h2>
            @foreach($category->faqItems as $faqItem)
                <div class="mb-3">
                    <strong>Q: </strong>{{ $faqItem->question }}<br>
                    <strong>A: </strong>{{ $faqItem->answer }}
                </div>
            @endforeach
            <hr>
        @endforeach
    </div>
@endsection