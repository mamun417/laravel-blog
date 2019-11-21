@extends('backend.layout.app')

@section('title', 'Posts')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Post</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Posts</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Posts <span class="badge badge-info">{{ $posts->count() }}</span></h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th><i class="fa fa-eye"></i></th>
                                        <th>Status</th>
                                        <th>Is Approve</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($posts as $key => $post)
                                        <tr class="gradeX">
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>
                                                <a href="{{ route('admin.posts.change.status', $post->id) }}" title="Change publication status">
                                                    @if($post->status)
                                                        <span class="badge badge-primary"><strong>Active</strong></span>
                                                    @else
                                                        <span class="badge badge-warning"><strong>Disable</strong></span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.posts.change.status', $post->id) }}" title="Change publication status">
                                                    @if($post->is_approved)
                                                        <span class="badge badge-primary"><strong>Approved</strong></span>
                                                    @else
                                                        <span class="badge badge-warning"><strong>Pending</strong></span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{{--<img src="{{ asset('images/category').'/'.$post->image }}" class="cus_thumbnail" alt="">--}}</td>
                                            <td>{{ date("d-m-Y", strtotime($post->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.posts.edit', $post->id) }}" title="Edit" class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                                </a>
                                                <a title="Delete" class="btn btn-danger cus_btn" onclick="event.preventDefault();
                                                    document.getElementById('class-delete-form{{ $post->id }}').submit();">
                                                    <i class="fa fa-trash"></i> <strong>Delete</strong>
                                                </a>

                                                <form id="class-delete-form{{ $post->id }}" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" style="display: none" >
                                                    @method('DELETE')
                                                    @csrf()
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
