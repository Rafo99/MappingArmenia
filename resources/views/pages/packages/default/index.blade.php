@extends('pages.layout.app')

@section('title', 'Tour Packages')

@section('content')

    <div class="content">
        <div class="content-heading">
            <h2>Our Tour Packages</h2>
        </div>
        <div class="block-rows">
            @foreach($tours->chunk(3) as $chunk)
                <div class="rows">
                    @foreach($chunk as $tour)
                        <div class="block">
                            <a href="{{ route('tour.show', $tour->id) }}"><img src="{{ asset('img/tours/'.$tour->picture) }}" alt=""></a>
                            <div class="block-title">
                                <div class="block-title-overlay"></div>
                                <h2><a href="{{ route('tour.show', $tour->id) }}">{{ strtoupper($tour->getTranslation('en')->title) }}</a></h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection