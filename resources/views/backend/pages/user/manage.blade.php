@extends('backend.layout.template')

@section('title') <title>All User Board </title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>All User Information</h4>
                <p class="mg-b-0">All user Information.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                    <div class='bg-white p-4'>
                        <!-- table start -->
                        <table class="table mg-b-0">
                           
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 ; @endphp
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>
                                        @if( !empty($user->profile))
                                        <img src="{{asset('backend/img/user/'. $user->profile)}}" style='width:35px;' alt="">
                                        @else
                                        -N/A-
                                        @endif
                                    </td>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if( $user->role == 1)
                                        User 
                                        @elseif( $user->role == 2)
                                        Admin
                                        @endif
                                    </td>
                                    <td>
                                        @if( $user->status == 1)
                                        Active
                                        @elseif( $user->status == 2)
                                        In-Active
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <ul class="action d-flex">
                                            <li><a href="{{route('user.edit', $user->id)}}" class='btn btn-primary btn-sm mx-2'><i class='fa fa-edit text-white'></i></a></li>
                                            <li><a href="#" class='btn btn-danger btn-sm' data-toggle="modal" data-target="#deluser{{$user->id}}"><i class='fa fa-trash text-white'></i></a></li>
                                        </ul>
                                        <!-- Deleted Modal code start -->
                                        <div class="modal fade" id="deluser{{$user->id}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Want to delete [{{$user->name}}] profile?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    এই একাউন্ট ডিলেট করতে না চাইলে  CLOSE বাটনে ক্লিক করুন।
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">CLOSE</button>
                                                            <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                                                @csrf 
                                                                <input type="submit" class='btn btn-danger' value='CONFIRM'>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Deleted Modal code end -->
                                    </td>
                                    
                                   
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                               
                            </tbody>
                        </table>
                        <!-- table end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection