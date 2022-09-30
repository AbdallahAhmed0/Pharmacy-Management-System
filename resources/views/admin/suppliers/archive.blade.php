@extends('layouts.admin.main')
@section('content')

<div class="breadcrumbs pt-1 pb-1">
    <div class="breadcrumbs-inner">

        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Suppliers</h1>
                    </div>

                    <div class="page-title" style="margin-top: -20px">
                        <ol class="breadcrumb text-right" style="font-size: 17px">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 mt-2">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Suppliers</a></li>
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
            <div class="col-lg-12">
                @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
            </div>

            <div class="col-lg-12">
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Archive</strong>
                    </div>
                        <div class="tableBox" >
                            <table id="dataTable" width="70%"class="table table-bordered table-striped" style="z-index: -1">

                            <thead>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Product</th>
                                    <th style="width: 15%">Actions</th>
                                </thead>
                            <tbody>

                               @foreach($data as $value)
                               <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->company}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->product}}</td>
                                <td>

                                    <div class="row">
                                        <div class="row">
                                            <div class="col-4" style="margin-left: 20px">
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
                                                                <a href="{{ route('suppliers.restoreArchive', $value['id']) }}"
                                                                    title="restore"><button
                                                                        class="btn btn-success">Restore</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <form action="{{ route('suppliers.destroyArchive', $value['id']) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <div class="col-4">
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
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

@endsection
