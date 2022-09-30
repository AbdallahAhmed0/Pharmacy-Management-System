@extends('layouts.admin.main')

@section('content')
    @include('admin.products.breadcrumbs')

    {{-- @if (Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg') }}</div>
@endif --}}

    <div class="content" style="font-size: 15px">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-12">
                    @if (Session::has('msg'))
                        <div class="alert alert-success alert-dismissible" id="msg-div">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('msg') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-white">
                            <strong class="card-title">Products
                            </strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" align="center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Expire Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    @forelse($data as $v)
                                        <tr>
                                            <td>{{ $v['id'] }}</td>

                                            <td><?php

                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $v['purchase_id']) {
                                                    echo $key['product'];
                                                }
                                            }
                                            ?>
                                            </td>

                                            <td> <?php
                                            $vari;
                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $v['purchase_id']) {
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
                                            ?>
                                            </td>
                                            <td>{{ $v['price'] }}</td>
                                                <td><?php

                                                foreach ($purchase as $key) {
                                                    if ($key['id'] == $v['purchase_id']) {
                                                        echo $key['quantity'];
                                                        break;
                                                    }
                                                }
                                                ?>
                                                </td>
                                            <td>{{ $v['discount'] }}</td>


                                            <td><?php

                                            foreach ($purchase as $key) {
                                                if ($key['id'] == $v['purchase_id']) {
                                                    echo $key['expiry_date'];
                                                }
                                            }
                                            ?>
                                            </td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <a href="{{ route('products.edit', $v['id']) }}"
                                                            title="edit"><button class="btn btn-primary"><i
                                                                    class="fa fa-edit"></i></button></a>
                                                    </div>
                                                    <div class="col-4" hidden>
                                                        <a href="{{ route('products.show', $v['id']) }}"
                                                            title="show"><button class="btn btn-success"><i
                                                                    class="fa fa-eye"></i></button></a>
                                                    </div>
                                                    <form action="{{ route('products.destroy', $v['id']) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="col-4">
                                                            <a class="btn btn-danger trigger-btn" title="delete"
                                                                href="#myModal" data-toggle="modal">
                                                                <i class="fa fa-trash"></i></a>

                                                            <!-- Modal HTML -->
                                                            <div id="myModal" class="modal fade">
                                                                <div class="modal-dialog modal-confirm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header flex-column">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title w-100">Are you sure?</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Do you really want to delete this product?
                                                                                This product will be archived.</p>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-center">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancel</button>
                                                                            <button class="btn btn-danger" title="delete"
                                                                                style="border-style: none; cursor: pointer;">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="4" style="font-weight: 700">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <script>
        setTimeout(() => {
            const box = document.getElementById('msg-div');

            box.style.display = 'none';

        }, 2500);
    </script>
@endsection
