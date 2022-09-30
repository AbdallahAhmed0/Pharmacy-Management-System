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
                            <li>Update Purchase</li>
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
                    <div class="card-body custom-edit-service">
                        @if($errors->any())
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <strong>update Purchases</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('purchases.update',$purchases['id'])}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Medicine Name<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product" value="{{$purchases['product']}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Category <span class="text-danger">*</span></label>
                                                    <select class="select2 form-select form-control" name="category" value="{{$purchases['category']}}">
                                                        @foreach ($Category_names as $category)
                                                        <option {{($purchases->category_id == $category->id) ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Supplier <span class="text-danger">*</span></label>
                                                    <select class="select2 form-select form-control" name="supplier" value="{{$purchases['supplier']}}">
                                                        @foreach ($Supplier_names as $supplier)
                                                        <option {{($purchases->supplier_id == $supplier->id) ? 'selected': ''}} value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Cost Price<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="cost_price" value="{{$purchases['cost_price']}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Quantity<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="quantity" value="{{$purchases['quantity']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Expire Date<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="expiry_date" value="{{$purchases['expiry_date']}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Medicine Image</label>
                                                    <input type="file" name="image" class="form-control" value="{{$purchases['image']}}">
                                                </div>
                                            </div>
                                            @if(!empty($purchases['image']))
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <img src="{{asset('storage\purchases').'\\'.$purchases['image']}}">
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="submit-section col-12">
                                            <input type="submit" value="Update Purchase" name="add"
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
