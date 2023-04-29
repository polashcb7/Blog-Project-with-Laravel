@extends('admin.master')
@section('title')
    Show Blog Details
@endsection
@section('content')
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="example2" class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                      <th scope="col">SL.</th>
                      <th scope="col">Category ID</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description </th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach($blog as $data)
                    <tr>
                        <td>{{ $i++  }}</td>
                        <td>{{$data->category_name}}</td>
                        <td>{{$data->author_name}}</td>
                        <td>{{substr($data->description,0,10)}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->status==1 ? 'Published' : 'Unpublished'}}</td>
                        <td class="btn-group gap-2">
                            <a href="{{route('edit.blog',['blog_id'=>$data->id])}} " class="btn btn-info btn-primary">Edit</a>
                            <form action="{{route('blog.delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$data->id}}">
                                <button class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
