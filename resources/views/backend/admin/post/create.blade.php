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
                    <a href="{{ route('admin.dashboard') }}">Home</a>
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
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create new post</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form">
                                    <div class="form-group"><label>Email</label> <input type="text" placeholder="Enter email" class="form-control"></div>
                                    <div class="form-group"><label>Password</label> <input type="text" placeholder="Password" class="form-control"></div>
                                    <div>
                                        <label> <input type="checkbox" class="i-checks"> Publication Status </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Categories and Tags</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form">
                                    <div class="form-group"><label>Email</label> <input type="text" placeholder="Enter email" class="form-control"></div>
                                    <div class="form-group"><label>Password</label> <input type="text" placeholder="Password" class="form-control"></div>
                                    <div>
                                        <button class="btn btn-danger" type="submit"><strong><i class="fa fa-arrow-left"></i> Back</strong></button>
                                        <button class="btn btn-success pull-right" type="submit"><strong><i class="fa fa-upload"></i> Published</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Body</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form">
                                    <div class="form-group">
                                        <input type="text" placeholder="Password" class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
