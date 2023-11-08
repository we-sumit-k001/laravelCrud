@extends('layouts.layout')

@section('content')
    <div class="columns">

        <div class="column ml-6">

            <img src="../../../storage/images/notfound.jpg" alt="" class="ml-6">
        </div>

        <div class="column ml-5">
            <h1 class="title is-family-monospace ml-6">
                Oh No ! Error 404
            </h1>

            <p class="is-size-4 is-family-monospace ml-5">
                Maybe Wrong Connection has Broken this Page. <br>
                Come back to the homepage
            </p>

            <div class="ml-6 mt-6">

                <a href="{{'/event/create'}}" class="button is-primary is-rounded  mr-6"> Event Page
                </a>
                <a href="{{'/organization/create'}}" class="button is-success is-rounded is-outlined ">Organization Page
                </a>
            </div>

        </div>

    </div>
@endsection

