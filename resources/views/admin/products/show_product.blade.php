@extends('layouts.admin.main')

@section('content')
    @include('admin.products.breadcrumbs')


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <strong class="card-title">Products</strong>
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
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Product Name</th>
                                        <th scope="col" class="border rounded"> <?php

                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $data['purchase_id']) {
                                                    echo $key['product'];
                                                }
                                            }
                                            ?> </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Category
                                        </th>
                                        <th scope="col" class="border rounded"> <?php
                                            $vari;
                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $data['purchase_id']) {
                                                    $vari = $key['category_id'];
                                                    break;
                                                }
                                            }

                                            foreach ($category as $k) {
                                                if ($k['id'] == $vari) {
                                                    echo $k['name'];
                                                    break;
                                                }
                                            }
                                            ?> </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Price</th>
                                        <th scope="col" class="border rounded"> {{ $data['price'] }} </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Quantity</th>
                                        <th scope="col" class="border rounded"> <?php

                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $data['purchase_id']) {
                                                    echo $key['quantity'];
                                                    break;
                                                }
                                            }
                                            ?> </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Discount</th>
                                        <th scope="col" class="border rounded"> {{ $data['discount'] }} </th>
                                    </tr>
                                </thead>

                                <thead class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    <tr>
                                        <th scope="col" class="bg-primary border rounded" style="color: white">Expire Date</th>
                                        <th scope="col" class="border rounded"> <?php

                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $data['purchase_id']) {
                                                    echo $key['expiry_date'];
                                                }
                                            }
                                            ?> </th>
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
