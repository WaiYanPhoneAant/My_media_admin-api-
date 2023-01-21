@extends('admin.layouts.app')
@section('post','active text-white bg-primary')
@section('header','Posts')
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


    <div class="d-none d-lg-block m-3 col-lg-5">
        <form action="{{route('postCreate')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 m-auto text-center">
                <img src="" width="150px" class="img" id="imagePreview-des">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Image</label>
                <input type="file" class="form-control image" name="image" id="category" aria-describedby="category">
                @error('image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" aria-describedby="category">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="category" class="form-label">Categories</label>
                <select class="form-select" name="category_id" aria-label="Choose your Gender">
                    <option value="" selected>Choose your category</option>
                    @foreach ($category as $c)
                        <option value="{{$c->category_id}}" {{old('category_id')==$c->category_id?'selected':''}}>{{$c->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control editor text-black" id="description"  cols="30" rows="10">{{old('description')}}</textarea>
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
            <i class="fa-solid fa-plus me-1"></i>Create Post
         </button>

    </div>

   <div class="m-1 col-lg-6">
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
                <h3 class="card-title ">Posts</h3>

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
                          <th>Post id</th>
                          <th>Post titile</th>
                          <th>Post Image</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts)==0)
                            <td colspan="4">There is no categories</td>
                        @endif
                        @foreach ($posts as $p)


                        <tr>

                            <td>{{$p->id}}</td>
                            <td>{{substr($p->title,0,15)}}</td>
                            <td>
                                @if ($p->image)

                                    <img src="{{asset('postImage/'.$p->image)}}" alt="" width="100px">
                                @else
                                {{$p->image}}
                                    <img src="{{asset('default/default.png')}}" alt="" width="100px">
                                @endif
                            </td>
                            <td>
                                {{-- data-bs-toggle="modal" data-bs-target="#ud-{{$p->id}} --}}
                                <a href="{{route('postEdit',$p->id)}}" class="btn btn-sm bg-dark text-white" "><i class="fa-regular fa-eye"></i></a>
                                <button class="btn btn-sm bg-danger text-white"  data-bs-toggle="modal" data-bs-target="#m-{{$p->id}}"><i class="fas fa-trash-alt"></i></button>
                              </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
              </div>
              <div class="p-2">
                {{ $posts->links() }}
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
    <form action="{{route('postCreate')}}" method="POST" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="crateCategoryLabel">Create Posts</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

            @csrf
            <div class="modal-body">

                @csrf
                <div class="mb-3 m-auto text-center">
                    <img src="" width="150px" class="img" id="imagePreview-res">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Image</label>
                    <input type="file" class="form-control image" name="image" id="category" varia-describedby="category">
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" aria-describedby="category">
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="category" class="form-label">Categories</label>
                    <select class="form-select" name="category_id" aria-label="Choose your Gender">
                        <option value="" selected>Choose your category</option>
                        @foreach ($category as $c)
                        <option value="{{$c->category_id}}" {{old('category_id')==$c->category_id?'selected':''}}>{{$c->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3 text-dark">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control editor" id="description"  cols="30" rows="10">{{old('description')}}</textarea>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>




            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create </button>
            </div>

      </div>
    </div>
    </form>
</div>

{{-- modals for delete and update --}}
@foreach ($posts as $p)
{{-- Modals for category delete --}}
  <div class="modal fade" id="m-{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">Attention!!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are Sure To Delete This post,{{$p->title}}!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{route('postDelete',$p->id)}}" type="button" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>


{{-- Modals for category update --}}

<div class="modal fade" id="ud-{{$p->id}}" tabindex="-1" aria-labelledby="udLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-primary" id="udLabel">Update Post ({{$p->title}})</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('category#update',$p->id)}}" method="POST">
            @csrf
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="Updatename" value="{{$p->title}}" id="category" aria-describedby="category">

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="Updatedescription" aria-label="description"  class="form-control " id="description" cols="30" rows="7">{{ old('Updatedescription',$p->description) }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create </button>
            </div>
        </form>
      </div>
    </div>
</div>


@endforeach

@endsection
@section('extraJs')
    <script>
        let uploadInputs = [...document.querySelectorAll(".image")];

        uploadInputs.forEach(uploadInput => {
            uploadInput.onchange = function () {
            let image = new FileReader();

            image.onload = function (e) {
                document.getElementById("imagePreview-des").src = e.target.result;
                document.getElementById("imagePreview-res").src = e.target.result;
            };
            image.readAsDataURL(this.files[0]); };
        });
    </script>

@endsection
