@extends('admin.layouts.app')
@section('category','active text-white bg-primary')
@section('header','Category')
@section('content')
<div class="m-3">
    @if ($errors->any())
        <div class="alert alert-dismissible fade show d-lg-none border border-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</div>

<div class="d-lg-flex justify-content-center">


    <div class="d-none d-lg-block m-3 col-lg-4">
        <form action="{{route('category#create')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" id="category" value="{{old('name')}}" aria-describedby="category">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" name="description" class="form-control" id="description" cols="30" rows="3">{{old('description')}}</textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create </button>
            </div>

        </form>
    </div>
    <div class=" m-3 d-lg-none">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crateCategory">
            <i class="fa-solid fa-plus me-1"></i>Create Category
         </button>

    </div>

   <div class="m-1 col-lg-7">
    <div class="container-fluid">
        @error('Updatename')
            <div class="m-3 text-danger d-none d-lg-block">*{{$message}}</div>
        @enderror
        @error('Updatedescription')
            <div class="m-3 text-danger d-none d-lg-block">*{{$message}}</div>
        @enderror
        <div class="row mt-4 ">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h3 class="card-title ">Category</h3>

                <div class="card-tools col-6 col-md-5 col-lg-3">
                    <form action="{{route('admin#category')}}">
                        <div class="input-group input-group-sm ">
                                <input type="text" name="searchKey" class="form-control " placeholder="Search...." aria-label="Search" aria-describedby="button-addon2">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    @if (request('searchKey'))
                    <span class="m-1 d-inline-block border border-1 p-1 rounded-1">{{request('searchKey')}}
                        <a href="{{route('admin#category')}}"><i class="fa-regular fa-circle-xmark text-danger"></i></a>
                    </span>
                    @endif



                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                          <th>Category id</th>
                          <th>Category name</th>
                          <th>Description</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories)==0)
                            <td colspan="4">There is no categories</td>
                        @endif
                        @foreach ($categories as $c)


                        <tr>

                            <td>{{$c->id}}</td>
                            <td>{{substr($c->description,0,15)}}</td>
                            <td>{{substr($c->description,0,30)}}</td>
                            <td>
                                <button class="btn btn-sm bg-dark text-white"  data-bs-toggle="modal" data-bs-target="#ud-{{$c->id}}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm bg-danger text-white"  data-bs-toggle="modal" data-bs-target="#m-{{$c->id}}"><i class="fas fa-trash-alt"></i></button>
                              </td>
                        </tr>
                        @endforeach



                      </tbody>
                </table>
              </div>
              <div class="m-2">
                {{ $categories->links() }}
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
        </div>

      </div>
   </div>


</div>
@endsection
@section('modal')
<!-- Modal for category create -->
<div class="modal fade" id="crateCategory" tabindex="-1" aria-labelledby="crateCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="crateCategoryLabel">Create Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('category#create')}}" method="POST">
            @csrf
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="category" aria-describedby="category">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" name="description" aria-label="description"  class="form-control" id="description" cols="30" rows="3">{{old('description')}}</textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create </button>
            </div>
        </form>
      </div>
    </div>
</div>


{{-- modals for delete and update --}}
@foreach ($categories as $c)

 {{-- Modals for category delete --}}
  <div class="modal fade" id="m-{{$c->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">Attention!!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are Sure To Delete This category,{{$c->name}}!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{route('category#Delete',$c->id)}}" type="button" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>


{{-- Modals for category update --}}

<div class="modal fade" id="ud-{{$c->id}}" tabindex="-1" aria-labelledby="udLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-primary" id="udLabel">Update Category ({{$c->name}})</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('category#update',$c->id)}}" method="POST">
            @csrf
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="Updatename" value="{{$c->name}}" id="category" aria-describedby="category">

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="Updatedescription" aria-label="description"  class="form-control" id="description" cols="30" rows="7">{{old('Updatedescription',$c->description)}}</textarea>

                    </div>



            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update </button>
            </div>
        </form>
      </div>
    </div>
</div>


@endforeach





@endsection
