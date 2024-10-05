@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Categories
                            <a href="{{ url('category') }}" class="btn btn-danger float-end"> Back</a>
                        </h4>
                    </div>
                    <div class="card-body" class="justify-content-center">
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control">{!! $category->description !!}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label>

                                <!-- Hidden input to ensure 'status' is always sent -->
                                <input type="hidden" name="status" value="0">

                                <!-- Checkbox input -->
                                <input type="checkbox" name="status" value="1"
                                    {{ $category->status == 1 ? 'checked' : '' }} style="width: 15px; height: 15px;" />

                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
