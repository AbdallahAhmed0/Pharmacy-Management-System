@extends('layouts.admin.main')

@section('content')
    @include('admin.categories.breadcrumbs')

    {{-- @if (Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg') }}</div>
@endif --}}

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-12" style="font-size: 15px">
                    @if (Session::has('msg'))
                        <div style="" class="alert alert-success alert-dismissible" id="msg-div">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('msg') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-white">
                            <strong class="card-title">Categories</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" align="center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Created date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable table table-striped table-bordered table-hover table-center mb-0">
                                    @forelse($data as $v)
                                        <tr>
                                            <td>{{ $v['id'] }}</td>
                                            <td>{{ $v['name'] }}</td>
                                            <td>{{ $v['created_at'] }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="{{ route('categories.edit', $v['id']) }}"
                                                            title="edit"><button class="btn btn-primary"><i
                                                                    class="fa fa-edit"></i></button></a>
                                                    </div>
                                                    <div class="col-3" hidden>
                                                        <a href="{{ route('categories.show', $v['id']) }}"
                                                            title="show"><button class="btn btn-success"><i
                                                                    class="fa fa-eye"></i></button></a>
                                                    </div>
                                                    <form action="{{ route('categories.destroy', $v['id']) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="col-3">
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
                                                                            <p>Do you really want to delete this category?
                                                                                This process cannot be undone.</p>
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

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
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
