@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Categories:</h2>
        @foreach($categories as $category)
            <div style="margin-left: 20px;">
                <h3>{{$category->name}}
                <form method="POST" action="{{ route('delete_category', ['id' => $category->id]) }}" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                        {{ __('Delete Item') }}
                    </button>
                </form></h3>
            </div>
        @endforeach


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