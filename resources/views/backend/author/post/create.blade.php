@extends('backend.layout.app')

@section('title', 'Create Post')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Post</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('author.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Posts</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <a href="{{ route('author.posts.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <form action="{{ route('author.posts.store') }}" method="post" enctype="multipart/form-data" role="form">
            @csrf

            @include('backend.author.post.element', ['is_create' => true])

        </form>
    </div>

@endsection

