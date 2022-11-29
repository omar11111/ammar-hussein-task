@extends('layouts.master')
@section('content')


    <div class="row mb-3 text-center">
        <div class="col-12 themed-grid-col">
            <h1>Title:- {{ $item->title }}</h1>
            <p>Body:- {{ $item->text }}</p>
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8 ">
                        <div class="card">
                            <div class="card-body">
                                <p><b>Comments</b></p>
                                <hr />
                                <livewire:comment />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
