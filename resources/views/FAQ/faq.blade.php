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
    <div class="row">
        @foreach($category->faqItems as $faqItem)
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Q: {{ $faqItem->question }}</h5>
                    <p class="card-text"><strong>A:</strong> {{ $faqItem->answer }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    @endforeach
</div>

<style>
    body {
        background-image: url('{{ asset('storage/images/faq.png') }}');
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