@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($reviews as $review)
            <review
                fd-name = "{{ $review['fundraiser_name'] }}"
                :rating = "{{ $review['rating'] }}"
                rv-name = "{{ $review['reviewer_name'] }}"
                rv-email = "{{ $review['reviewer_email'] }}"
                rv-date = "{{ date('m/d/Y', strtotime($review['review_date'])) }}">
                {{ $review['review'] }}
            </review>
        @endforeach

        @if(count($reviews) === 0)
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    No Reviews!
                </div>
                <div class="panel-body">
                    <p>There are currently no reviews in the system. Please click on the "Add Review" button to add one.</p>
                </div>
            </div>
        </div>
            @endif
    </div>
    <new-review></new-review>
@endsection