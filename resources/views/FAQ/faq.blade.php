@extends('layouts.app')

@section('content')

    
    <div class="container">
        <div class="mb-3">
            <h1>FAQ</h1>
            @if(Auth::user()->role=='admin')    
            <a href="{{ route('faq.edit_faq') }}" class="btn btn-primary">Edit FAQ</a> 
            @endif
        </div>
    </div>
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