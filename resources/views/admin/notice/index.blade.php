@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">All Notices</li>
              </ol>
            </nav>
            @if(count($notices)>0)
            @foreach($notices as $notice)
            <div class="card alert alert-info">
                <div class="card-header alert alert-warning" style="color:black;">{{$notice->title}}</div>

                <div class="card-body" style="color:black;">
                    <p>{{$notice->description}}</p>
                    <p class="badge badge-success">Data:{{$notice->date}}</p>
                     <p class="badge badge-warning">Created By:{{$notice->name}}</p>
                </div>
                <div class="card-footer">

                    <a href="{{route('notices.edit',[$notice->id])}}"><i class="fas fa-edit"></i></a>
                    <span class="float-right">

                         <a href="{{route('notices.destroy',[$notice->id])}}" data-toggle="modal" data-target="#exampleModal{{$notice->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                    <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="{{route('notices.destroy',[$notice->id])}}" method="post">@csrf
                        {{method_field('DELETE')}}
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        Do you want to delete?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
                <!--Modal end-->


                    </span>
                </div>
            </div>
            @endforeach

            @else
            <p>No notices created yet</p>
            @endif

        </div>
    </div>
</div>
@endsection