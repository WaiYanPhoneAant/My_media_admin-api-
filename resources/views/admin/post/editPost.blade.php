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
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 m-auto text-center">
                <img src="" width="150px" class="image" id="imagePreview-des">
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
                <input type="text" class="form-control" name="title" id="title" value="{{old('title',$posts->title)}}" aria-describedby="category">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="category" class="form-label">Categories</label>
                <select class="form-select" name="category_id" aria-label="Choose your Gender">
                    <option value="" selected>Choose your category</option>
                    @foreach ($category as $c)
                        <option value="{{$c->category_id}}" {{old('category_id',$posts->category_id)==$c->category_id?'selected':''}}>{{$c->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control editor" id="description"  cols="30" rows="10">{{$posts->description}}</textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Post </button>
            </div>

        </form>
    </div>
    <div class=" m-3 d-lg-none">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crateCategory">
            <i class="fa-solid fa-plus me-1"></i>Update Post
         </button>

    </div>

   <div class="m-1 col-lg-6 text-left">
    <div class="container-fluid">
        @error('Updatename')
            <div class="m-3 text-danger d-none d-lg-block">*{{$message}}</div>
        @enderror
        @error('Updatedescription')
            <div class="m-3 text-danger d-none d-lg-block">*{{$message}}</div>
        @enderror
        <div class="row mt-4 ">
          <div class="col-12 p-3">
                <div class="wrapper">
                    <h2 class="pb-1">{{$posts->title}}</h2>
                    @if ($posts->image)
                        <div class="text-center py-4">
                                <img src="{{asset('postImage/'.$posts->image)}}" class="image" alt=""width="100%">
                        </div>
                    @endif
                    <div class="body-text pt-1">
                        <p>
                            {!! $posts->description !!}
                        </p>
                    </div>
                </div>

            <!-- /.card -->
          </div>
        </div>

      </div>
   </div>


</div>
@endsection
@section('modal')

<!-- Modal for category update -->
<div class="modal fade" id="crateCategory" tabindex="-1" aria-labelledby="crateCategoryLabel" aria-hidden="true">
    <form action="#" method="POST" enctype="multipart/form-data">
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
                    <img src="" width="150px" class="image" id="imagePreview-res">
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
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title',$posts->title)}}" aria-describedby="category">
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="category" class="form-label">Categories</label>
                    <select class="form-select" name="category_id" aria-label="Choose your Gender">
                        <option value="" selected>Choose your category</option>
                        @foreach ($category as $c)
                            <option value="{{$c->category_id}}" {{old('category_id',$posts->category_id)==$c->category_id?'selected':''}}>{{$c->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control editor" id="description"  cols="30" rows="10">{{$posts->description}}</textarea>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Post </button>
            </div>

      </div>
    </div>
    </form>
</div>
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
