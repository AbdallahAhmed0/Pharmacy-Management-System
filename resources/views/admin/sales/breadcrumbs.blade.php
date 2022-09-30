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
                            <li>Sales</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-4 col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title" style="margin-top: 14px">
                            <a href="{{ route('sales.archive') }}"><button data-toggle="modal"
                                    class="btn btn-warning float-right mt-3">
                                    Archive</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title" style="margin-top: 14px">
                            <a href="{{ route('sales.create') }}"><button data-toggle="modal"
                                    class="btn btn-primary float-right mt-3">
                                    Add Sale</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

