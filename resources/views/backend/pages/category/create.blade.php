@extends('backend.layout.template')

@section('title') <title>blog website Crate A new User</title>  @endsection

@section('body-content')

    <div class="br-mainpanel">
        <div class="br-pagetitle" style='margin-top:-20px;background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Add A New Member </h4>
                <p class="mg-b-0">New Member add.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-15">

                    <div class="bg-white p-4 border">
                        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control" placeholder='Category name...'>
                            </div>
                            <div class="form-group">
                                <label for="">Category </label>
                                <select name="is_parent" class='form-control' id="">
                                    <option value="0">-select Category-</option>
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id}}">{{ $category->name}}</option>
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
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Thumnail</label><br>
                                <input type="file" name="img" class="form-file-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add" value="Add Category" class="btn w-100" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection