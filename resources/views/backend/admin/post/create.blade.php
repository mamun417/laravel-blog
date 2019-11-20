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
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create new post</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.posts.store') }}" method="post" role="form">
                                    @csrf

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title" type="text" placeholder="Enter title" class="form-control">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Image</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input name="img" type="file" accept="image/*">
                                        </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                        @error('img')
                                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label> <input type="checkbox" class="i-checks"> Publication Status </label>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Categories and Tags</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group" style="margin-bottom: 0">
                                    <label>Select Categories</label>
                                    <select name="categories[]" class="tokenize-categories" multiple>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" style="margin-bottom: 0">
                                    <label>Select Tags</label>
                                    <select name="tags[]" class="tokenize-tags" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-danger" style="margin-bottom: 0" type="submit"><strong><i class="fa fa-arrow-left"></i> Back</strong></button>
                                    <button class="btn btn-success pull-right" style="margin-bottom: 0" type="submit"><strong><i class="fa fa-upload"></i> Published</strong></button>
                                </div>
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
                                <div class="form-group">
                                    <textarea name="body" rows="6" class="summernote form-control"></textarea>
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

@section('custom-js')

    <script>

        $('.tokenize-categories').tokenize2({
            placeholder: "e.g. (laravel javascript vueJs)",
            searchFromStart: false,
            displayNoResultsMessage: true,
            noResultsMessageText: "No results mached '%s'",
        });

        $('.tokenize-tags').tokenize2({
            placeholder: "e.g. (wordpress jquery regex)",
            searchFromStart: false,
            displayNoResultsMessage: true,
            noResultsMessageText: "No results mached '%s'",
        });

    </script>

@endsection
