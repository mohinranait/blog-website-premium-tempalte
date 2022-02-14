
@extends('backend.layout.template')

@section('title') <title>All Category</title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Dashboard</h4>
                <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">


                <div class="p-4 bg-white border">
                   
                    <table class="table  mg-b-0">
                       
                        @if (\Session::has('success'))
                            <p class="alert alert-success text-center">
                                {!! \Session::get('success') !!}
                            </p>
                        @endif
                      
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Thumnail</th>
                                <th>Category Name</th>
                                <th>Category</th>
                                <th>Status Type</th>
                                <th>Status</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $categorys as $category)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    @if( !empty($category->image))
                                    <img src="{{asset('backend/img/category/' . $category->image)}}" style='width:35px' alt="">
                                    @else
                                    -N/A-
                                    @endif
                                </td>
                                <td>{{$category->name}}</td>
                                <td>
                                    @if( $category->is_parent == 0)
                                    Primary Category
                                    @elseif($category->is_parent != 0)
                                    Sub Category
                                    @endif
                                </td>
                                <td>
                                    @if( $category->status == 1)
                                        <span>Live</span>
                                    @elseif($category->status == 2)
                                    <span>Desable</span>
                                    @endif
                                </td>
                                <td>
                                        @if( $category->status == 1)
                                        <a href="{{route('category.status', $category->id)}}" class='btn btn-success btn-sm'><i ></i>Active</a>
                                        @else
                                        <a href="{{route('category.status', $category->id)}}" class='btn btn-warning btn-sm'><i></i>In-active</a>
                                        @endif
                                </td>
                                
                                <td>
                                    <ul class=' action d-flex justify-content-around'>
                                       

                                        <li><a href="{{route('category.edit',$category->id)}}" class='btn btn-primary btn-sm'><i class='fa fa-edit'></i>EDIT</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#delete{{$category->id}}" class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>DELETE</a></li>
                                    </ul>
                                    <!-- Delete Modal start  -->
                                    <div class="modal fade" id="delete{{$category->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                        
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Delete [{{ $category->name}}] Category?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div>
                                                        এই ক্যাটাগরিটি ডিলেট করতে না চাইলে  CLOSE বাটনে ক্লিক করুন।
                                                    </div>
                                                </div>
                                            
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">DELETE</button>
                                                        <form action="{{route('category.destroy', $category->id)}}" method="POST">
                                                            @csrf 
                                                            <input type="submit" class='btn btn-danger' value='CONFIRM'>
                                                        </form>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal end -->
                                </td>
                               
                                
                            </tr>
                                @foreach( App\Models\category::orderby('name','asc')->where('is_parent', $category->id)->get() as $sCut)
                                <tr>
                                    <th scope="row">-- </th>
                                    <td>
                                        @if( !empty($sCut->image))
                                        <img src="{{asset('backend/img/category/' . $sCut->image)}}" style='width:35px' alt="">
                                        @else
                                        -N/A-
                                        @endif
                                    </td>
                                    <td>{{$sCut->name}}</td>
                                    <td>
                                        @if( $sCut->is_parent == 0)
                                        Primary Category
                                        @elseif($sCut->is_parent != 0)
                                        Sub Category
                                        @endif
                                    </td>
                                    <td>
                                        @if( $sCut->status == 1)
                                            <span>Live</span>
                                        @elseif($sCut->status == 2)
                                        <span>Desable</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $sCut->status == 1)
                                        <a href="{{route('category.status', $sCut->id)}}" class='btn btn-success btn-sm'><i ></i>Active</a>
                                        @else
                                        <a href="{{route('category.status', $sCut->id)}}" class='btn btn-warning btn-sm'><i></i>In-Active</a>
                                        @endif
                                </td>
                                    <td>
                                        <ul class=' action d-flex justify-content-around'>
                                            <li><a href="{{route('category.edit',$sCut->id)}}" class='btn btn-primary btn-sm'><i class='fa fa-edit'></i>EDIT</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete{{$sCut->id}}" class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>DELETE</a></li>
                                        </ul>
                                        <!-- Delete Model start -->
                                        <div class="modal fade" id="delete{{$sCut->id}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                            
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Delete <strong class='text-danger'> {{ $sCut->name}}</strong> Category?</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div>
                                                            এই ক্যাটাগরিটি ডিলেট করতে না চাইলে  CLOSE বাটনে ক্লিক করুন।
                                                        </div>
                                                    </div>
                                                
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">CLOSE</button>
                                                            <form action="{{route('category.destroy', $sCut->id)}}" method="POST">
                                                                @csrf 
                                                                <input type="submit" class='btn btn-danger' value='CONFIRM'>
                                                            </form>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Model end -->
                                    </td>
                                    
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection