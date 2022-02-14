@extends('backend.layout.template')

@section('title') <title> Create A new Post</title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Update Post Information</h4>
                <p class="mg-b-0">Update post.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                    <div class='bg-white  p-4'>
                        <form action="{{route('post.update', $updates->id)}}" method="POST" enctype='multipart/form-data'>
                            @csrf 

                           

                             <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Post Title <sup class='text-danger'>*</sup></label>
                                        <input type="text" name='name' value="{{$updates->name}}" class='form-control' required placeholder="Title...">
                                    </div>
                                </div>
                               
                                
                            </div>
                            
                            <div class="form-group">
                                <textarea name="body" class='form-control' id="ckeditor" required cols="30" rows="10">{{$updates->body}}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="">Sort Description</label>
                                        <textarea name="description" class='form-control' id="" cols="30" rows="5">{{$updates->descrip}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Search Tags</label>
                                       <input type="text" name='tag' value="{{$updates->tag}}" class='form-control'>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" class='form-control' id="">
                                            <option value="0">-Select Category-</option>
                                            @foreach( $categorys as $category)
                                            <option value="{{$category->id}}"
                                                @if( $updates->cat_id == 0)
                                                @elseif( $updates->cat_id !=0 )
                                                    @if( $updates->cat_id == $category->id ) selected @endif
                                                @endif
                                            >{{$category->name}}</option>
                                                @foreach( App\Models\category::orderby('name','asc')->where('is_parent', $category->id)->where('status',1)->get() as $subCat)
                                                <option value="{{$subCat->id}}"
                                                    @if( $updates->cat_id == 0)
                                                    @elseif( $updates->cat_id !=0 )
                                                        @if( $updates->cat_id == $subCat->id ) selected @endif
                                                    @endif
                                                >-- {{$subCat->name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Status</label>
                                        <select name="status" class='form-control' id="">
                                            <option value="1">-Select Status-</option>
                                            <option value="1" @if( $updates->status == 1 ) selected @endif >Active</option>
                                            <option value="2" @if( $updates->status == 2 ) selected @endif >In-Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Fiture Image<sup class='text-danger'>*</sup></label> <br>
                                       <input type="file" name='fitureimg'  class='form-file-control'>
                                    </div>
                                    
                                </div>
                            </div> 
                            <input type="submit" value='Update Post' class='btn w-100' style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection