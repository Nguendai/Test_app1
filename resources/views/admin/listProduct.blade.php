@extends("layouts.app")
@section("content")
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                    <a href="{{url('admin/add')}}"><button type="button" class="btn btn-primary">Add product</button></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            @include('errors.logErrors')
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Img</th>
                        <th>Description</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($product as $pd) 
                   <tr class="odd gradeX" align="center">
                    <td>{{$i++}}</td>
                    <td>{{$pd->name}}</td>
                    <td>{{$pd->price}}</td>
                    <td><img src="upload/images/{{$pd->images}}" alt="" width ="120px" class="thumbnail"></td>
                    <td>{{$pd->description}}</td>
                    
                    <td class="center"><i  onclick="return deleteProduct();" class="fa fa-trash-o fa-fw"></i><a href="admin/delete/{{$pd->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/edit/{{$pd->id}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
</div>
@endsection