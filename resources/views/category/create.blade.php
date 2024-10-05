@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Categories
                            <a href="{{ url('category') }}" class="btn btn-danger float-end"> Back</a>
                        </h4>
                    </div>
                    <div class="card-body" class="justify-content-center">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" checked style="width: 15px; height: 15px;" />
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </div>
                            <br>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
