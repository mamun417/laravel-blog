<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th><i class="fa fa-eye"></i></th>
            <th>Status</th>
            <th>Is Approve</th>
            <th>Image</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($posts as $key => $post)
            <tr class="gradeX">
                <td>{{ Str::limit($post->title, 30) }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->view_count }}</td>
                <td>
                    <a href="{{ route('admin.posts.change.status', $post->id) }}" title="Change publication status">
                        @if($post->status)
                            <span class="badge badge-primary"><strong>Active</strong></span>
                        @else
                            <span class="badge badge-warning"><strong>Disable</strong></span>
                        @endif
                    </a>
                </td>
                <td>
                    <a onclick="changeApproveStatus({{ $post->id }}, {{ $post->is_approved }})" href="JavaScript:void(0)" >
                        @if($post->is_approved)
                            <span class="badge badge-primary"><strong>Approved</strong></span>
                        @else
                            <span class="badge badge-warning"><strong>Pending</strong></span>
                        @endif
                    </a>
                    <form id="approve-form{{ $post->id }}" method="GET" action="{{ route('admin.posts.change.approve-status', $post->id) }}" style="display: none" >
                        @csrf()
                    </form>
                </td>
                <td><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" class="cus_thumbnail" alt="{{ $post->title }}"></td>
                <td>{{ date("d-m-Y", strtotime($post->created_at)) }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post->id) }}" title="Edit" class="btn btn-success cus_btn">
                        <i class="fa fa-eye"></i> <strong>View</strong>
                    </a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" title="Edit" class="btn btn-info cus_btn">
                        <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                    </a>
                    <a onclick="deleteRow({{ $post->id }})" href="JavaScript:void(0)" title="Delete" class="btn btn-danger cus_btn">
                        <i class="fa fa-trash"></i> <strong>Delete</strong>
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
