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
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{route('sales.index')}}">Sales</a></li>
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

    function exportReoprt() {
        $('#sales-table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: 'Export Data',
                buttons: [{
                        extend: 'pdf',
                        exportOptions: {
                            columns: "thead th:not(.action-btn)"
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: "thead th:not(.action-btn)"
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: "thead th:not(.action-btn)"
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: "thead th:not(.action-btn)"
                        }
                    }
                ]
            }]
        });
    }
</script>

<div class="content" style="padding-left: 80px; padding-right: 80px; ">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                @if(Session::has('msg'))
                <div class="alert alert-success" id="msg-div'">{{Session::get('msg')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <strong class="card-title col col-md-4">Sales Report</strong>
                            <strong class="card-title col col-md-4"></strong>
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <input type="button" value="make report" onclick='show()' style="float: right" id="btn" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                        <!-- @php $fdate=$ldate=0; @endphp -->
                        <!-- try to use request in getreport method on controller -->
                        <form action="{{route('sales.getReport');}}" method="post">
                            @csrf
                            <div id='form' style="display: none;">
                                <div class="row">
                                    <div class="col col-md-2"></div>
                                    <div class="col col-md-4">
                                        <label for="fdate">from:</label>
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
                    @isset($data)
                    <div class="card-body">
                        <!-- <div class="dt-buttons btn-group flex-wrap">
                            <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle" tabindex="0" aria-controls="sales-table" type="button" aria-haspopup="true" aria-expanded="false" onclick="exportReoprt()"><span>Export Data</span></button></div>
                        </div> -->

                        <table class="table" id='sales-table'>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Date & Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$d->id}} </td>
                                    <td class="sorting_1">{{$d->customer_name}} </td>
                                    <td>{{$d->total_price.'$'}}</td>
                                    <td>{{$d->created_at}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endisset
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
