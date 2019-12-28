@extends('backend.layout.app')

@section('title', 'Comments')

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
                    <a>Comments</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Comments <span class="badge badge-info">{{ count($comments) }}</span></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th class="text-center">Comments Info</th>
                                    <th class="text-center">Post Info</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($comments as $comment)

                                    <tr class="gradeX">
                                        <td>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" width="64" height="64">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        {{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small>
                                                    </h4>
                                                    <p>{{ $comment->body }}</p>
                                                    <a target="_blank" href="{{ route('frontend.post.view', $comment->commentable->slug.'#comments') }}">Reply</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a target="_blank" href="{{ route('frontend.post.view', $comment->commentable->slug) }}">
                                                        <img class="media-object" src="{{ Storage::disk('public')->url('post/'.$comment->commentable->image) }}" width="64" height="64">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <a target="_blank" href="{{ route('frontend.post.view', $comment->commentable->slug) }}">
                                                        <h4 class="media-heading">{{ $comment->commentable->title }}</h4>
                                                    </a>
                                                    <p>by <strong>{{ $comment->commentable->user->name }}</strong></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a onclick="deleteRow({{ $comment->id }})" href="JavaScript:void(0)" title="Remove" class="btn btn-danger cus_btn">
                                                <i class="fa fa-trash"></i> <strong>Delete</strong>
                                            </a>

                                            <form id="row-delete-form{{ $comment->id }}" method="POST" action="{{ route('admin.comments.delete', $comment->id) }}" style="display: none" >
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

