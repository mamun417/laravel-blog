@extends('backend.layout.app')

@section('title', 'Favorite Posts')

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
                    <a>Favorite Posts</a>
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
                        <h5>Favorite Posts <span class="badge badge-info">{{ $posts->count() }}</span></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th><i class="fa fa-heart"></i></th>
                                        <th><i class="fa fa-eye"></i></th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($posts as $post)
                                    <tr class="gradeX">
                                        <td>{{ $post->id }}</td>
                                        <td style="text-align: left">{{ Str::limit($post->title, 30) }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->favorite_users_count }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" class="cus_thumbnail" alt="{{ $post->title }}"></td>
                                        <td>{{ date("d-m-Y", strtotime($post->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('admin.posts.show', $post->id) }}" title="Edit" class="btn btn-success cus_btn">
                                                <i class="fa fa-eye"></i> <strong>View</strong>
                                            </a>
                                            <a href="{{ route('frontend.post.favorite.store', $post->id) }}" title="Remove" class="btn btn-danger cus_btn">
                                                <i class="fa fa-trash"></i> <strong>Remove</strong>
                                            </a>

                                            <form id="row-delete-form{{ $post->id }}" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" style="display: none" >
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

