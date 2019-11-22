@extends('backend.layout.app')

@section('title', 'View Post')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>View Post</h2>
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
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs"
                   type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="social-feed-box">
                    <div class="social-avatar">
                        <div class="media-body">
                            <button class="btn btn-xs btn-primary pull-right"><strong><i class="fa fa-check"></i> Approved</strong></button>
                            <a href="#">
                                Andrew Williams
                            </a>
                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>
                    <div class="social-body">
                        <p>
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
                            in their infancy. Packages and web page editors now use Lorem Ipsum as their
                            default model text.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident
                            rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste
                            voluptatibus minus veritatis qui ut
                        </p>

                        <p>
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
                            in their infancy. Packages and web page editors now use Lorem Ipsum as their
                            default model text.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident
                            rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste
                            voluptatibus minus veritatis qui ut
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 m-b-lg">
                <div class="vertical-container light-timeline no-margins">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-content float-e-margins">
                            <h2>Categories</h2>
                            <button class="btn btn-xs btn-info"><strong>Information</strong></button>
                            <button class="btn btn-xs btn-info"><strong>Information</strong></button>
                            <button class="btn btn-xs btn-info"><strong>Information</strong></button>
                            <button class="btn btn-xs btn-info"><strong>Information</strong></button>
                            <button class="btn btn-xs btn-info"><strong>Information</strong></button>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-content float-e-margins">
                            <h2>Tags</h2>
                            <button class="btn btn-xs btn-success"><strong>Information</strong></button>
                            <button class="btn btn-xs btn-success"><strong>Information</strong></button>
                            <button class="btn btn-xs btn-success"><strong>Info</strong></button>
                            <button class="btn btn-xs btn-success"><strong>Infooo</strong></button>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-content">
                            <h2>Featured Image</h2>
                            <img alt="image" class="img-responsive b-r-sm" src="http://66.media.tumblr.com/20a9c501846f50c1271210639987000f/tumblr_n4vje69pJm1st5lhmo1_1280.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
