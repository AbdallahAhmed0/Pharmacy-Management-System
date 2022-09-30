@extends('layouts.admin.main')
@section('content')
    @include('admin.sales.breadcrumbs')


    <div class="content">
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
                            <strong class="card-title">Sales</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $d->id }} </td>
                                            <td class="sorting_1">{{ $d->customer_name }} </td>
                                            <td>{{ $d->total_price . '$' }}</td>
                                            <td>{{ $d->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('sales.edit', $d['id']) }}"
                                                        class="editbtn col-md-4"><button class="btn btn-primary"><i
                                                                class="fa fa-edit"></i></button></a>

                                                    <form action="{{ route('sales.destroy', $d['id']) }}" method="post"
                                                        enctype="multipart/form-data">
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
                                    @endforeach
                                </tbody>
                            </table>
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
