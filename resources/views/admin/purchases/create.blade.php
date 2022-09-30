@extends('layouts.admin.main')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1 style="font-size: 25px">Purchases</h1>
                        </div>
                        <div class="page-title" style="margin-top: -20px">
                            <ol class="breadcrumb text-right" style="font-size: 17px">
                                <li><a href="{{ route('purchases.index') }}">Purchases</a></li>
                                <li>Add Purchases</li>
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
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <strong>Create Purchase</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form method="post" enctype="multipart/form-data" autocomplete="off"
                                        action="{{ route('purchases.store') }}">
                                        @csrf
                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Medicine Name<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="product"
                                                            value="{{ old('product') }}">
                                                            @error('product')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Category <span class="text-danger">*</span></label>
                                                        <select class="select2 form-select form-control" name="category"
                                                            value="{{ old('category') }}">
                                                            @foreach ($Category_names as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Supplier <span class="text-danger">*</span></label>
                                                        <select class="select2 form-select form-control" name="supplier"
                                                            value="{{ old('supplier') }}">
                                                            @foreach ($Supplier_name as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('supplier')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Cost Price<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="cost_price"
                                                            value="{{ old('cost_price') }}">
                                                            @error('cost_price')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Quantity<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="quantity"
                                                            value="{{ old('quantity') }}">
                                                            @error('quantity')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="service-fields mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Expire Date<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="date" name="expiry_date"
                                                            value="{{ old('expiry_date') }}">
                                                            @error('expiry_date')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Medicine Image</label>
                                                        <input type="file" name="image" class="form-control"
                                                            value="{{ old('image') }}">
                                                        @error('image')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="submit-section col-12">
                                                <input type="submit" value="Add Purchase" name="add"
                                                    class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /Add Medicine -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
