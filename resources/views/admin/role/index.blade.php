@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">All Departments</li>
              </ol>
            </nav>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif


           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>

            <tbody>
                @if(count($roles)>0)
                @foreach($roles as $key=>$role)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$role->name}}</td>
					<td>{{$role->description}}</td>
					<td><a href="{{route('roles.edit',[$role->id])}}"><i class="fas fa-edit"></i></a></td>
					<td>
                     <a href="#" data-toggle="modal" data-target="#exampleModal{{$role->id}}">
					<i class="fas fa-trash"></i>
					</a>
					<!-- modal -->
					<div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<form action="{{route('roles.destroy',[$role->id])}}" method="post">
								@csrf
								@method('DELETE')
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Do you want to delete this record?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
							</div>
							</form>
						</div>
						</div>
					<!-- modal end -->
				    </td>

					@endforeach
					@endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
