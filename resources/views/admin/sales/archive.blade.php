@extends('layouts.admin.main')
@section('content')


<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 25px">Sales archive</h1>
                    </div>
                    <div class="page-title" style="margin-top: -20px">
                        <ol class="breadcrumb text-right" style="font-size: 17px">
                            <li><a href="{{ route('sales.index') }}">Sales</a></li>
                            <li>Sales archive</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                @if(Session::has('msg'))
                <div class="alert alert-success" id="msg-div">{{Session::get('msg')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Sales</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Date & Time</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$d->id}} </td>
                                    <td class="sorting_1">{{$d->customer_name}} </td>
                                    <td>{{$d->total_price.'$'}}</td>
                                    <td>{{$d->created_at}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-5">
                                                    <a class="btn btn-success trigger-btn" title="restore"
                                                        href="#myModal" data-toggle="modal">
                                                        <i class="fa fa-caret-square-o-down"></i></a>

                                                    <!-- Modal HTML -->
                                                    <div id="myModal" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to restore this product?
                                                                        It will be added to the products again.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <a href="{{ route('sales.restore', $d['id']) }}"
                                                                        title="restore"><button
                                                                            class="btn btn-success">Restore</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <form action="{{ route('sales.destroyArchive', $d['id']) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <div class="col-5">
                                                    <a class="btn btn-danger trigger-btn" title="delete" href="#myModal1"
                                                        data-toggle="modal">
                                                        <i class="fa fa-trash"></i></a>

                                                    <!-- Modal HTML -->
                                                    <div id="myModal1" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete this product?
                                                                        This process cannot be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-danger" title="delete"
                                                                        style="border-style: none; cursor: pointer;">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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

<script>
    setTimeout(() => {
        const box = document.getElementById('msg-div');

        box.style.display = 'none';

    }, 2500);
</script>
@endsection
