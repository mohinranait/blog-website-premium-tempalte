@extends('backend.layout.template')

@section('title') <title>blog website admint dashboard</title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Update User Information</h4>
                <p class="mg-b-0">Update User.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                    <div class='bg-white p-4'>
                        <form action="{{route('user.update', $userUpdate->id)}}" method="POST" enctype='multipart/form-data'>
                            @csrf 
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name='name' class='form-control' value="{{$userUpdate->name}}" required placeholder="Full Name...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name='email' required value="{{$userUpdate->email}}" class='form-control' placeholder="Email...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name='phone' class='form-control' value="{{$userUpdate->phone}}" required placeholder="Phone...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name='address' class='form-control' value="{{$userUpdate->address}}" required placeholder="Address...">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   
                                    <div class="form-group">
                                        <label for="">Cuntry</label>
                                        <select name="cuntry" class='form-control' id="">
                                            <option value="">-Select Cuntry-</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select name="role" required class='form-control' id="">
                                                    <option value="" >-Select Role-</option>
                                                    <option value="1" @if( $userUpdate->role == 1) selected @endif >User</option>
                                                    <option value="2"  @if( $userUpdate->role == 2) selected @endif>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" required class='form-control' id="">
                                                    <option value="">-Select Cuntry-</option>
                                                    <option value="1" @if( $userUpdate->status == 1) selected @endif>Active</option>
                                                    <option value="2" @if( $userUpdate->status == 2) selected @endif>In-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label for="">Picture</label><br>
                                       <input type="file" name='image' class='form-file-control'>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn w-100" value='Update Profile' style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection