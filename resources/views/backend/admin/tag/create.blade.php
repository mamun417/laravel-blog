@extends('backend.layout.app')

@section('title', 'Create Tag')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Tag</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Tags</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
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
                        <h5>Create tag</h5>
                    </div>
                    <div class="ibox-content">
                        <form action="{{ route('admin.tags.store') }}" method="POST" class="form-horizontal">
                            @csrf

                            <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-8">
                                    <input name="name" type="text" placeholder="Enter name" class="form-control">
                                    @error('name')
                                        <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <a href="{{ route('admin.tags.index') }}" class="btn btn-sm btn-danger" type="submit">Cancel</a>
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
