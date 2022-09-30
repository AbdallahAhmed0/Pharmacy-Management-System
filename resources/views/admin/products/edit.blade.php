@extends('layouts.admin.main')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 25px">Products</h1>
                        </div>
                        <div class="page-title" style="margin-top: -20px">
                            <ol class="breadcrumb text-right" style="font-size: 17px">
                                <li><a href="{{ route('products.index') }}">Products</a></li>
                                <li>Edit products</li>
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
                <form action="{{ route('products.update', $data['id']) }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="row form-row">

                        <div class="col-12">
                            <div class="form-group" data-select2-id="select2-data-8-g7cz">
                                <label>Product <span class="text-danger">*</span></label>
                                <select class="select2 form-select form-control select2-hidden-accessible"
                                    name="purchase_id" data-select2-id="select2-data-1-g7ce" tabindex="-1"
                                    aria-hidden="true">
                                    <option value="{{ $data['purchase_id'] }}" data-select2-id="select2-data-3-3pql"><?php

                                    foreach ($purchase as $key) {
                                        if ($key['id'] == $data['purchase_id']) {
                                            echo $key['product'];
                                        }
                                    }
                                    ?>
                                    </option>
                                    @foreach ($purchase as $v)
                                        <option value="{{ $v['id'] }}" data-select2-id="select2-data-3-3pql">
                                            {{ $v['product'] }}</option>
                                    @endforeach
                                    @error('purchase_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Selling Price <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $data['price'] }}" name="price" class="form-control">
                                @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Discount (%) <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $data['discount'] }}" name="discount" class="form-control">
                                @error('discount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Descriptions <span class="text-danger">*</span></label>
                                <textarea class="form-control service-desc"  name="description">
                                    {{ $data['description'] }}
                                </textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Update Product" name="update" class="btn btn-primary btn-block">
                </form>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
