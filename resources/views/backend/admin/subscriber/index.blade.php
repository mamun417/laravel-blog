@extends('backend.layout.app')

@section('title', 'Subscribers')

@push('css')

@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Subscriber</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a>Subscribers</a>
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
                        <h5>Subscribers <span class="badge badge-info">{{ $subscribers->count() }}</span></h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $key => $subscriber)
                                        <tr class="gradeX">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $subscriber->email }}</td>
                                            <td>{{ date("d-m-Y", strtotime($subscriber->created_at)) }}</td>
                                            <td>
                                                <a onclick="deleteRow({{ $subscriber->id }})" href="JavaScript:void(0)" title="Delete" class="btn btn-danger cus_btn">
                                                    <i class="fa fa-trash"></i> <strong>Delete</strong>
                                                </a>

                                                <form id="row-delete-form{{ $subscriber->id }}" method="POST" action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" style="display: none" >
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
