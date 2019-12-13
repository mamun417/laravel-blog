@extends('backend.layout.app')

@section('title', 'Dashboard')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
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
                            <h2 class="font-bold">{{ $total_views }}</h2>
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

        <div class="row">

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget style1 bg-danger">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span><b>Total Authors</b></span>
                                    <h2 class="font-bold">{{ $total_authors }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget style1 bg-info">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span><b>Today Authors</b></span>
                                    <h2 class="font-bold">{{ $today_authors }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget style1 bg-warning">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-th fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span><b>Total Categories</b></span>
                                    <h2 class="font-bold">{{ $total_categories }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget style1 bg-success">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-tags fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span><b>Total Tags</b></span>
                                    <h2 class="font-bold">{{ $total_tags }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                    <div class="ibox float-e-margins" style="margin-top: 12px">
                        <div class="ibox-title">
                            <h5>TOP <span class="badge badge-danger"><strong>6</strong></span> POPULAR POSTS</h5>
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($popular_posts as $key => $post)
                                        <tr class="gradeX">
                                            <td>{{ $key+1 }}</td>
                                            <td style="text-align: left">{{ Str::limit($post->title, 30) }}</td>
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
                                            <td>
                                                <a target="_blank" href="{{ route('frontend.post.view', $post->slug) }}" title="Edit" class="btn btn-success cus_btn">
                                                    <i class="fa fa-eye"></i> <strong>View</strong>
                                                </a>
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
