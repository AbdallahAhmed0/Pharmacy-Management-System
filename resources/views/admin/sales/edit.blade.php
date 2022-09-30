@extends('layouts.admin.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 25px">Sales</h1>
                    </div>
                    <div class="page-title" style="margin-top: -20px">
                        <ol class="breadcrumb text-right" style="font-size: 17px">
                            <li><a href="{{ route('sales.index') }}">Sales</a></li>
                            <li>Update sales</li>
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
                                <strong>Update Sale </strong> {{$sale->id}}
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('sales.update',$sale['id'])}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Sale ID</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{$sale->id}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Total Price</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{$sale->total_price}}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="customer_name" value="{{$sale->customer_name}}" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="select" class=" form-control-label">Drugs report</label></div>
                                        <div class="col col-md-4"><label for="select" class=" form-control-label">Drug</label></div>
                                        <div class="col col-md-4"><label for="select" class=" form-control-label">Quantity</label></div>
                                        @foreach($report as $r)
                                        <div class="col col-md-3"></div>
                                        <div class="col-6 col-md-4">
                                            <select name="product[]" id="select" class="form-control">
                                                @foreach($Prodect_names as $Prodect)
                                                @foreach($Purchases_names as $pName)
                                                @if ($pName['id'] == $Prodect['purchase_id'])
                                                @if($pName['quantity'] > 0)
                                                <option {{ ($r['prodects_id']==$Prodect['id'])?"selected":"" }} value="{{ $Prodect['id'] }}">{{ $pName['product'] }}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <input type="text" id="text-input" name="quantity[]" value="{{$r->quantity}}" class="form-control">
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="row mt-4">
                                        <div class="submit-section col-12">
                                            <input type="submit" value="Update Sale" name="add"
                                                class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
@endsection
