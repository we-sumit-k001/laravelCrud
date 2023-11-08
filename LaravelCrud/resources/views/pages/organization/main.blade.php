@extends('layouts.layout')
@section('title')
    Organization
@endsection

@section('content')



    {{--Here I am trying to store the organization  details --}}

    @include('pages.organization.button')


    {{--Here I am trying to store the organization  details --}}

    @include('pages.organization.create')





    @if (session()->has('successMessage'))
        <script>
            alertify.message('{{ session('successMessage') }}');
        </script>
    @endif


    {{--Here I am trying to show  the organization  details in the table--}}

    @include('pages.organization.table')




{{--Here is the code for Edit the organization details --}}

    @include('pages.organization.edit')



{{--  Here is the code For View the Organization data --}}


    @include('pages.organization.view')





@endsection

@push('scripts')

    <script src="../../../storage/scripts/organization.js">


    </script>



@endpush
