

@extends('layouts.admin.main')
@section('content')

<div class="content2">

        <div style="width: 55%;margin: auto;padding: 10px;" class="well well-sm center">

            <h4>Add User</h4><hr>

            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                  <div class="form-group">
                    <label for="some" class="col-form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="some" required>

                    @error('name')
                       <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">email</label>
                    <input type="email" name="email" placeholder="example@email.com" class="form-control" id="some" required>
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">Password</label>
                    <input type="password" name="password"  class="form-control" id="some"required >
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="some" class="col-form-label">Avatar</label>
                    <input type="file"  name="avatar"  class="form-control" id="some" >
                    @error('avatar')
                    <small class="text-danger">{{$message}}</small>
                 @enderror
                  </div>

                  <div class="center">
                    <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-success">Reset</button>
                  </div>
            </form>
        </div>
    </div>

@endsection
