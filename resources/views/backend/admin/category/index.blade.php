@extends('backend.layout.app')

@section('title', 'Categories')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Category</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Categories</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Categories</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr class="gradeX">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.change.status', $category->id) }}" title="Change publication status">
                                                    @if($category->status)
                                                        <span class="badge badge-primary"><strong>Active</strong></span>
                                                    @else
                                                        <span class="badge badge-warning"><strong>Disable</strong></span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td><img src="{{ asset('images/category').'/'.$category->image }}" class="cus_thumbnail" alt=""></td>
                                            <td>{{ date("d-m-Y", strtotime($category->created_at)) }}</td>
                                            <td>{{ date("d-m-Y", strtotime($category->updated_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" title="Edit" class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                                </a>
                                                <a title="Delete" class="btn btn-danger cus_btn" onclick="event.preventDefault();
                                                    document.getElementById('class-delete-form{{ $category->id }}').submit();">
                                                    <i class="fa fa-trash"></i> <strong>Delete</strong>
                                                </a>

                                                <form id="class-delete-form{{ $category->id }}" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" style="display: none" >
                                                    @method('DELETE')
                                                    @csrf()
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
