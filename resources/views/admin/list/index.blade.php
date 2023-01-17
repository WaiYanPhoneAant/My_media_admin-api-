@extends('admin.layouts.app')
@section('list','active text-white bg-primary')
@section('header','Admin List')
@section('content')
<div class="content-wrapper mt-3">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session('error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="row mt-4 ">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h3 class="card-title ">User Table</h3>

                <div class="card-tools col-6 col-md-5 col-lg-3">
                    <form action="{{route('admin#list')}}">
                        <div class="input-group input-group-sm ">
                                <input type="text" name="searchKey" class="form-control " placeholder="Search...." aria-label="Search" aria-describedby="button-addon2">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    @if (request('searchKey'))
                    <span class="m-1 d-inline-block border border-1 p-1 rounded-1">{{request('searchKey')}}
                        <a href="{{route('admin#list')}}"><i class="fa-regular fa-circle-xmark text-danger"></i></a>
                    </span>
                    @endif
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>

                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="{{$user->phone?'':'text-warning'}}" >{{$user->phone?:'Not filled'}}</td>
                        <td class="{{$user->gender?'':'text-warning'}}" >{{$user->gender?:'Not filled'}}</td>
                        <td class="{{$user->address?'':'text-warning'}}" >{{$user->address?:'Not filled'}}</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          @if ($user->id!=Auth::user()->id)
                                <button class="btn btn-sm bg-danger text-white"  data-bs-toggle="modal" data-bs-target="#m-{{$user->id}}"><i class="fas fa-trash-alt"></i></button>
                          @else
                            <span class="text-muted fw-bold">mine</span>
                          @endif

                        </td>
                      </tr>
                    @endforeach



                  </tbody>
                </table>
              </div>
              <div class="m-2">
                {{ $users->links() }}
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- Button trigger modal -->

@endsection

@section('modal')
      <!-- Modal -->
  @foreach ($users as $user)
  <div class="modal fade" id="m-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are Sure To Delete This Account,{{$user->name}}!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{route('admin#deleteAcc',$user->id)}}" type="button" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
