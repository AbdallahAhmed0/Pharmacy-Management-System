@extends('layouts.admin.main')

@section('content')
    @include('admin.categories.breadcrumbs')


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <strong class="card-title">Categories</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" align="center">
                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">ID</th>
                                        <th scope="col" class="border rounded"> {{ $data['id'] }} </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Name</th>
                                        <th scope="col" class="border rounded"> {{ $data['name'] }} </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Created at</th>
                                        <th scope="col" class="border rounded"> {{ $data['created_at'] }} </th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
