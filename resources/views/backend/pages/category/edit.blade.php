@extends('backend.layout.template')

@section('title') <title>blog website Crate A new User</title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Update Category</h4>
                <p class="mg-b-0">New Member add.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-15">

                    <div class="bg-white p-4 border">
                        <form action="{{route('category.update', $updateCategorys->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$updateCategorys->name}}" placeholder='Category name...'>
                            </div>
                            <div class="form-group">
                                <label for="">Category </label>
                                <select name="is_parent" class='form-control' id="">
                                    <option value="0">-select Category-</option>
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id}}"
                                        @if( $updateCategorys->is_parent == 0)
                                        @elseif( $updateCategorys->is_parent != 0)
                                            @if( $updateCategorys->is_parent == $category->id ) selected @endif
                                        @endif
                                    >{{ $category->name}}</option>
                                    @foreach( App\Models\category::orderby('name','asc')->where('is_parent', $category->id)->get() as $sCut)
                                        <option value="{{$sCut->id}}">-- {{ $sCut->name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status </label>
                                <select name="status" class='form-control' id="">
                                    <option value="1">-select status-</option>
                                    <option value="1" @if( $updateCategorys->status == 1) selected @endif>Active</option>
                                    <option value="2" @if( $updateCategorys->status == 2) selected @endif>In-Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                
                                <img src="{{asset('backend/img/category/' . $updateCategorys->image)}}" style='width:50px' alt=""><br>
                                <label for="">Thumnail</label><br>
                                <input type="file" name="img" class="form-file-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add" value="Update Category" class="btn w-100" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection