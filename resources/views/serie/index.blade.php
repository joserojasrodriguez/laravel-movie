@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16 pb-24">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Series Populares</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularSeries as $serie)
                    <x-serie-card :serie="$serie" :genres="$genres"/>
                @endforeach
            </div>
        </div>
@endsection
