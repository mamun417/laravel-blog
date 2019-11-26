@extends('backend.layout.app')

@section('title', 'Update Setting')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Update Setting</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('author.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Setting</a>
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
                        <h5>Setting</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user-circle-o"></i>Profile</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-shield"></i>Password</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="ibox float-e-margins">
                                            <form action="{{ route('author.settings.profile.update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Name</label>
                                                    <div class="col-sm-11">
                                                        <input name="name" value="{{ Auth::user()->name }}" type="text" class="form-control">
                                                        @error('name')
                                                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Email</label>
                                                    <div class="col-sm-11">
                                                        <input name="email" value="{{ Auth::user()->email }}" type="text" class="form-control">
                                                        @error('email')
                                                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Image</label>
                                                    <div class="col-sm-11">
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
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">About</label>
                                                    <div class="col-sm-11">
                                                        <textarea name="about" class="form-control" rows="4">{{ Auth::user()->about }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-1 col-lg-10">
                                                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger" type="submit"><strong>Cancel</strong></a>
                                                        <button class="btn btn-sm btn-primary" type="submit"><strong>Submit</strong></button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="ibox float-e-margins">
                                            <form action="{{ route('author.settings.password.change') }}" method="POST" class="form-horizontal">
                                                @csrf

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Old Password</label>
                                                    <div class="col-sm-10">
                                                        <input name="old_password" type="password" class="form-control">
                                                        @error('old_password')
                                                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">New Password</label>
                                                    <div class="col-sm-10">
                                                        <input name="password" type="password" class="form-control">
                                                        @error('password')
                                                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input name="password_confirmation" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger" type="submit"><strong>Cancel</strong></a>
                                                        <button class="btn btn-sm btn-primary" type="submit"><strong>Submit</strong></button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
