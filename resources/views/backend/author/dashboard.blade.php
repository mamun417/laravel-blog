@extends('backend.layout.app')

@section('title', 'Dashboard')

@section('content')

    <div class="wrapper wrapper-content">

        <div class="row">

            <div class="col-lg-3">
                <div class="widget style1 bg-success">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b>Total Posts</b></span>
                            <h2 class="font-bold">{{ $posts->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-eye fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b>Total Views</b></span>
                            <h2 class="font-bold">{{ $all_views }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-heart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b>Total Favorite</b></span>
                            <h2 class="font-bold">{{ $total_favorite_posts }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-refresh fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b>Total Pending</b></span>
                            <h2 class="font-bold">{{ $total_pending_posts }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right"><i class="fa fa-th-list"></i></span>
                        <h5>Post</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('author.posts.index') }}"><h1 class="no-margins"><b>{{ $posts->count() }}</b></h1></a>
                        <small>Total post</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right"><i class="fa fa-eye"></i></span>
                        <h5>Views</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('author.posts.index') }}" style="color: #1ab394"><h1 class="no-margins"><b>{{ $all_views }}</b></h1></a>
                        <small>Total views</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right"><i class="fa fa-heart"></i></span>
                        <h5>Favorite</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('author.posts.index') }}" class="text-info"><h1 class="no-margins"><b>{{ $total_favorite_posts }}</b></h1></a>
                        <small>Favorite post</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-warning pull-right"><i class="fa fa-history"></i></span>
                        <h5>Pending</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('author.posts.index') }}" class="text-warning"><h1 class="no-margins"><b>{{ $total_pending_posts }}</b></h1></a>
                        <small>Pending post</small>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="row m-t-md">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>TOP <span class="badge badge-danger"><strong>5</strong></span> POPULAR POSTS</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Comments</th>
                                    <th>Favorite</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($popular_posts as $key => $post)
                                    <tr class="gradeX">
                                        <td>{{ $key+1 }}</td>
                                        <td style="text-align: left">{{ Str::limit($post->title, 50) }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td>{{ $post->comments_count }}</td>
                                        <td>{{ $post->favorite_users_count }}</td>
                                        <td>
                                            <a>
                                                @if($post->is_approved)
                                                    <span class="badge badge-primary"><strong>Approved</strong></span>
                                                @else
                                                    <span class="badge badge-warning"><strong>Pending</strong></span>
                                                @endif
                                            </a>
                                        </td>
                                        <td>{{ date("d-m-Y", strtotime($post->created_at)) }}</td>
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
