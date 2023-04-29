@extends('admin.master')
@section('title')
    Manage Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class=" text-center text-uppercase"> Category Table </h6>
                        <hr/>
                       <table class="table table-hover table-bordered table-striped">

                           <thead class="text-center">
                           <tr>
                             <th>sl</th>
                             <th>Category Name</th>

                             <th>Image</th>
                             <th>Status</th>
                             <th>Action</th>

                           </tr>

                           </thead>

                           @php $i=1; @endphp
                           @foreach($categories as $category)
                           <tbody class="text-center">
                           <tr>
                           <td>{{$i++}}</td>
                           <td>{{$category->category_name}}</td>

                           <td><img src="{{asset($category->image)}}" class="img-fluid" style="height:50px; width:50px;"></td>
                           <td>{{$category->status==1? 'published':'unpublished'}}</td>
                           <td class="btn-group gap-1">
                               <a href="{{route('edit.category',['category_id'=>$category->id])}}" class="btn btn-primary">Edit</a>
                               @if($category->status==1)
                                   <a href="" class="btn btn-warning">Unpublished</a>
                               @else
                                   <a href="" class="btn btn-success">Published</a>
                                   @endif
                               <from action-="">
                                   <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure!')" value="Delete">
                               </from>
                           </td>
                           </tr>
                           </tbody>
                           @endforeach
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
