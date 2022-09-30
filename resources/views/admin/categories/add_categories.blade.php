@extends('layouts.admin.main')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 25px">Categories</h1>
                        </div>
                        <div class="page-title" style="margin-top: -20px">
                            <ol class="breadcrumb text-right" style="font-size: 17px">
                                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                                <li>Add categories</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--content-->
<div class="content">
    <div class="animated fadeIn">


        <div class="modal-body bg-white">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Add category <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" value="Add Category" name="add" class="btn btn-primary btn-block">
            </form>
        </div>


    </div><!-- .animated -->
</div><!-- .content -->

@endsection


