@extends('layouts.admin.main')
@section('content')

<div class="content2">

        <div style="width: 55%;margin: auto;padding: 10px;" class="well well-sm center">

            <h4>Edit Supplier</h4><hr>

            <form action="{{ route('suppliers.update',$data->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')

                  <div class="form-group">
                    <label for="some" class="col-form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="some" value="{{$data->name}}" required>
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">email</label>
                    <input type="email" name="email" placeholder="example@email.com" class="form-control" id="some" value="{{$data->email}}"required>
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">Phone</label>
                    <input type="text" name="phone"  class="form-control" id="some" value="{{$data->phone}}"required>
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">Company</label>
                    <input type="text" name="company"  class="form-control" id="some" value="{{$data->company}}"required>
                    @error('company')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">Address</label>
                    <input type="text" name="address"  class="form-control" id="some" value="{{$data->address}}"required>
                  </div>

                    <div class="form-group">
                    <label for="some" class="col-form-label">Product</label>
                    <input type="text" class="form-control" name="product" id="some" value="{{$data->product}}"required >
                    @error('product')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">Comment</label>
                    <input type="text" class="form-control" name="comment" id="some" value="{{$data->comment}}">
                  </div>

                  <div class="center">
                    <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-success">Reset</button>
                  </div>
            </form>
        </div>
    </div>

@endsection
