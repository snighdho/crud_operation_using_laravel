@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif


                <div class="card">
                    <div class="card-header">
                        <h4>Categories Lists
                            <a href="{{ url('category/create') }}" class="btn btn-primary float-end"> Add Categories</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->status == 1 ? 'Visible' : 'Hidden' }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('category.show', $category->id) }}"
                                                class="btn btn-secondary">View</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit"class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
