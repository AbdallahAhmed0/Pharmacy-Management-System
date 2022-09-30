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
                                <li>Suppliers</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 mt-2">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('suppliers.archive') }}" class="btn btn-warning">Archive</a></li>
                                <li><a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Suppliers</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content" style="font-size: 14px">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-12">
                    <div class="col-lg-12">
                        @if (Session::has('msg'))
                            <div class="alert alert-success" id="msg-div">{{ Session::get('msg') }}</div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Suppliers</strong>
                        </div>
                        <div class="tableBox">
                            <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">

                                <thead>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Product</th>

                                    <th style="width: 10%">Actions</th>

                                </thead>
                                <tbody>

                                    @foreach ($data as $value)
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->company }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->product }}</td>
                                        <td>

                                            <div class="row ">
                                                <div class="fa-hover col-lg-5 col-md-6">
                                                    <a href="{{ route('suppliers.edit', $value->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <div class="fa-hover col-lg-5 col-md-6">
                                                    <form action="{{ route('suppliers.destroy', $value->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            onclick="return confirm('Are You Sure You Want to Delete This Record?');"
                                                            name="delete" class="btn btn-sm btn-danger"><i
                                                                class="fa fa-trash"></i></button>
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

    <script>
        setTimeout(() => {
            const box = document.getElementById('msg-div');

            box.style.display = 'none';

        }, 2500);
    </script>
@endsection
