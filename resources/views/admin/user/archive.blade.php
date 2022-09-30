@extends('layouts.admin.main')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">

        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Archive</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('user.index')}}" class="btn btn-primary">All Users</a></li>

                            <li><a href="{{route('user.create')}}" class="btn btn-success">Add User</a></li>
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
                                    <th>Avatar</th>
                                    <th style="width: 15%">Actions</th>
                                </thead>
                            <tbody>

                               @foreach($data as $value)
                               <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>
                                    @isset($value->avatar)
                                    <img src="{{asset('images/'.$value->avatar)}}"width=100px;>
                                    @endisset
                                </td>

                                <td>
                                    <div class="row ">
                                        <div class="fa-hover col-lg-4 col-md-4">
                                            <a href="{{ route('user.restoreArchive',$value->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                        </div>
                                        <div class="fa-hover col-lg-4 col-md-4">
                                                <form action="{{ route('user.destroyArchive',$value->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are You Sure You Want to Delete This Record?');"  name="delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>                                                </form>
                                        </div>

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
