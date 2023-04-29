
@extends('admin.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class=" text-center text-uppercase">Edit Blog</h6>
                        <hr/>
                        <form class="row g-3" action="{{route('update.blog')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="blog_id" value={{$blog->id}}>
                            <div class="col-12">
                                <label class="form-label">Author Name</label>
                                <input type="text" name="author_name" value="{{$blog->author_name}}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{$blog->title}}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Blog Type</label>
                                <select class="form-control" name="blog_type" id="">
                                    <option value="popular" {{$blog->blog_type == 'popular' ? 'selected' : ' '}}>Popular</option>
                                    <option value="trending" {{$blog->blog_type == 'trending' ? 'selected' : ' '}}>Trending</option>
                                    <option value="featured" {{$blog->blog_type == 'featured' ? 'selected' : ' '}}>Featured</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" value="{{$blog->image}}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Status&nbsp;&nbsp;&nbsp;&nbsp; : {{$blog->status==1?  'Published':'Unpublished'}}</label>
                                <br>
                                <input type="radio" name="status" value="0"> &nbsp;&nbsp; Unpublished
                                <input type="radio" name="status" value="1"> &nbsp;&nbsp; Published



                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
