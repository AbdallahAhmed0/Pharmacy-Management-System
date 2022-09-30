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
                            <li><a href="">Dashboard</a></li>
                            <li><a href="{{ route('products.index') }}">Products</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title" style="margin-top: 14px">
                            <a href="{{ route('products.archive') }}"><button data-toggle="modal"
                                    class="btn btn-warning float-right mt-3">
                                    Archive</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title" style="margin-top: 14px">
                            <a href="{{ route('products.create') }}"><button data-toggle="modal"
                                    class="btn btn-primary float-right mt-3">
                                    Add Product</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Central Modal Fluid -->
{{-- <div class="modal fade" id="centralModalFluid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fluid" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                ...
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div> --}}
<!-- Central Modal Fluid -->
