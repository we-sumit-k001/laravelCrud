@extends('layouts.layout')

@section('title')
    Events
@endsection


@section('content')
    <div class="columns is-mobile is-multiline is-centered mt-6">

        <div class="column is-one-fifth ml-5">
            <h1 class="title is-3 ml-5">Events</h1>
        </div>

        <div class="column is-one-fifth mr-5">
            <button class="button is-info" id="modal_open_btn">
                Add a New Event
            </button>
        </div>

        <div class="column is-one-fifth mr-5">

            <a href="{{'/organization/create'}}" class="button is-primary"> Add a New Organization</a>
        </div>
    </div>





    {{--Here I am Store the value of Event Details in the Database --}}


    @include('pages.event.create')




   {{--Here is the code of the bulk action drop down --}}

    @include('pages.event.bulkaction')

    @if (session()->has('successMessage'))
        <script>
            alertify.message('{{ session('successMessage') }}');
        </script>
    @endif

    {{--Here I am Trying to Show table of  the Event details --}}


    @include('pages.event.table')

    {{--Here I am Trying to Edit the Event details --}}

    @include('pages.event.edit')


    {{--Here we View the Event Details--}}

    @include('pages.event.view')



@endsection

@push('scripts')

    <script src="../../../storage/scripts/event.js"></script>
@endpush





