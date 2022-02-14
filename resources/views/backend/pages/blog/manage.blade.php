@extends('backend.layout.template')

@section('title') <title>All Blog post</title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>All Post Board</h4>
                <p class="mg-b-0">Post Information.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                    <div class='bg-white p-4 '>
                        @if( \Session::has('massage'))
                            <p class="alert alert-success text-center">
                                {!! \Session::get('massage') !!}
                            </p>
                        @endif
                        <table class="table mg-b-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Post</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 ; @endphp
                                @foreach( $posts as $post)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>
                                        @if( !empty($post->thumnail))
                                        <img src="{{asset('backend/img/blogpost/' . $post->thumnail)}}" style='width:35px;' alt="">
                                        @else
                                        -N/A-
                                        @endif
                                    </td>
                                    <td>{{$post->name}}</td>
                                    <td>
                                        @if( !empty($post->cat_id))
                                        {{ $post->category->name}}
                                        @else
                                        UnCategory
                                        @endif
                                    </td>
                                    <td>
                                        @if( !empty($post->author))
                                        {{ $post->userInfo->name}}
                                        @else
                                        Admin
                                        @endif
                                    </td>
                                    <td>
                                        @if( $post->status == 1)
                                        Live
                                        @else
                                        Pending
                                        @endif
                                    </td>
                                    <td>
                                        <ul class='d-flex action'>
                                            <li><a href="{{route('post.edit', $post->id)}}" class='btn btn-primary btn-sm '><i class='fa fa-edit text-white'></i></a></li>
                                            <li><a href="#" class='btn btn-danger btn-sm mx-2' data-toggle="modal" data-target="#delete{{$post->id}}"><i class='fa fa-trash text-white'></i></a></li>
                                            <li><a href="#" class='btn btn-info btn-sm'>View</a></li>
                                        </ul>
                                        <!-- Delete Modal code start -->
                                        <div class="modal fade" id="delete{{$post->id}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Delete <strong class='text-danger'>{{ $post->name}}</strong> Post?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                এই পোষ্টটি ডিলেট করতে না চাইলে  CLOSE বাটনে ক্লিক করুন।
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">CLOSE</button>
                                                        <form action="{{route('post.destroy', $post->id)}}" method="POST">
                                                            @csrf 
                                                            <input type="submit" class='btn btn-danger' value='CONFIRM'>
                                                        </form>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        <!-- Delete Modal code end-->
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection