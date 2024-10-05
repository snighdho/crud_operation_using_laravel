@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Categories
                            <a href="{{ url('category') }}" class="btn btn-danger float-end"> Back</a>
                        </h4>
                    </div>
                    <div class="card-body justify-content-center">
                        <div class="mb-3">
                            <label><b>Name</b></label>
                            <br>
                            <p>{{ $category->name }}</p> <!-- Fixed quote issue here -->

                        </div>
                        <div class="mb-3">
                            <label><b>Description</b></label>
                            <br>
                            <p>{!! $category->description !!}</p>

                        </div>
                        <div class="mb-3">
                            <label><b>Status</b></label>
                            <br>
                            <p>{{ $category->status == 1 ? 'checked' : '' }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
