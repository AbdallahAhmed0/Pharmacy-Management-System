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
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{route('purchases.index')}}">Purchases</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function show() {
        document.getElementById("form").style.display = "inline";
    }
</script>

<div class="content" style="padding-left: 80px; padding-right: 80px; ">
    <div class="animated fadeIn">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-12">
                    @if(Session::has('msg'))
                    <div class="alert alert-success" id="msg-div">{{Session::get('msg')}}</div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <strong class="card-title col col-md-4">Purchase Report</strong>
                            <strong class="card-title col col-md-4"></strong>
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <input type="button" value="make report" style="float: right" onclick='show()' id="btn" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                        @php $fdate=$ldate=0; @endphp
                        <!-- try to use request in getreport method on controller -->
                        <form action="{{route('purchase.getReport');}}" method="post">
                            @csrf
                            <div id='form' style="display: none;">
                                <div class="row">
                                    <div class="col col-md-2"></div>
                                    <div class="col col-md-4">
                                        <label for="fdate">From:</label>
                                        <input type="date" name="fdate" id="">
                                    </div>
                                    <div class="col col-md-4">
                                        <label for="fdate">To:</label>
                                        <input type="date" name="ldate" id="">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col col-md-5"></div>
                                    <input type="submit" value="get report" class="btn btn-primary">

                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> Medicine Name</th>
                                    <th scope="col"> Category</th>
                                    <th scope="col"> Supplier</th>
                                    <th scope="col"> Purchase Cost</th>
                                    <th scope="col"> Quantity</th>
                                    <th scope="col"> Expire Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($data)
                                @foreach ($data as $d)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$d['product']}} </td>
                                    @foreach ($Category_names as $name)
                                    @if($name['id'] == $d['category_id'])
                                    <td>{{$name['name']}} </td>
                                    @endif
                                    @endforeach
                                    @foreach ($Supplier_name as $sup)
                                    @if($sup['id'] == $d['supplier_id'])
                                    <td>{{$sup['name']}} </td>
                                    @endif
                                    @endforeach
                                    <td>{{$d['cost_price'].'$'}} </td>
                                    <td>{{$d['quantity']}} </td>
                                    <td>{{$d['expiry_date']}} </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
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
