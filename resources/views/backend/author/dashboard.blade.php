@extends('backend.layout.app')

@section('title', 'Dashboard')

@section('content')

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right"><i class="fa fa-th-list"></i></span>
                        <h5>Post</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $posts->count() }}</h1>
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
                        <h1 class="no-margins">{{ $all_views }}</h1>
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
                        <h1 class="no-margins">{{ Auth::user()->favoritePosts()->count() }}</h1>
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
                        <h1 class="no-margins">{{ $total_pending_posts }}</h1>
                        <small>Pending post</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
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
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td>{{ $post->comments->count() }}</td>
                                        <td>{{ $post->favoriteUsers()->count() }}</td>
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
