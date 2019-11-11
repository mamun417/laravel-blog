@extends('backend.layout.app')

@section('title', 'Tag')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Tag</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Tags</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <a href="{{ route('admin.tags.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tags</h5>
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
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tags as $key => $tag)
                                        <tr class="gradeX">
                                            <td>1</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>
                                                <a href="" title="Change publication status">
                                                    @if($tag->status)
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-warning">Disable</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{{ date("d-m-Y", strtotime($tag->created_at)) }}</td>
                                            <td>{{ date("d-m-Y", strtotime($tag->updated_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.tags.edit', $tag->id) }}" title="Edit" class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i> Edit
                                                </a>
                                                <a title="Delete" class="btn btn-danger cus_btn" onclick="event.preventDefault();
                                                    document.getElementById('class-delete-form{{ $tag->id }}').submit();">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>

                                                <form id="class-delete-form{{ $tag->id }}" method="POST" action="{{ route('admin.tags.destroy', $tag->id) }}" style="display: none" >
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
