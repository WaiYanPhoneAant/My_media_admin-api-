<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="V-Media blog web">
    <title>V Media</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon.ico/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon_io/site.webmanifest')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('custom_asset/style.css')}}">
</head>

<body class="d-flex">


    <nav class="offcanvas-sm offcanvas-start col-12 col-sm-1 col-md-2  border-end border-3  d-flex flex-column " style="min-height: 100vh;"  tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="d-flex logo justify-content-between justify-content-sm-center p-4  p-sm-3">
            <img class="" src="{{asset('./storage/image/logo.png')}}" alt="logo">
            <span class="d-none d-md-block fs-2 fw-bold ">Media</span>
            <button type="button" class="btn-close d-block d-sm-none" aria-label="close button" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close"></button>

        </div>
        <div class="mb-5"  style="margin-top: 6rem;">
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item  @yield('profile') mb-1" aria-label="Profile" title="profile">
                    <a href="{{route('dashboard')}}" aria-current="Page" class="nav-link d-flex ps-3   flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                        <i class="fa-solid fa-user pe-2"></i> <span class="d-sm-none d-md-block ">Profile</span>
                    </a>
                </li>
                <li class="nav-item  mb-1 @yield('list')" title="admin list" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                    <a href="{{route('admin#list')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                        <i class="fa-solid fa-users  pe-2"></i><span class="d-sm-none d-md-block">Admin List </span>
                    </a>
                </li>
                <li class="nav-item  mb-1 @yield('category')" title="category"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                    <a href="{{route('admin#category')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                        <i class="fa-solid fa-table-list  pe-2"></i> <span class="d-sm-none d-md-block">Category</span>
                    </a>
                </li>
                <li class="nav-item  mb-1 @yield('post')" title="posts"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                    <a href="{{route('admin#post')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                        <i class="fa-regular fa-pen-to-square  pe-2"></i> <span class="d-sm-none d-md-block">Post</span>
                    </a>
                </li>
                <li class="nav-item  mb-1 @yield('trend_post')" title="trending post"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                    <a href="{{route('admin#trendPost')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                        <i class="fa-solid fa-ranking-star  pe-2"></i> <span class="d-sm-none d-md-block">Trending Post </span>
                    </a>
                </li>
                <form action="{{route('logout')}}" method="POST">
                    <li class="nav-item  mb-1" title="log out"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                        @csrf
                        <button  aria-current="Page" class="btn nav-link d-flex ps-3 text-danger col-12  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                            <i class="fa-solid fa-arrow-right-from-bracket  pe-2"></i><span class="d-sm-none d-md-block">Log Out </span>
                        </button>
                    </li>
                </form>
            </ul>
        </div>
    </nav>
    <section class="d-flex col-12 col-sm-11 col-md-10 flex-column">

            <div class="border border-bottom border-1 navbar sec-nav sticky-top bg-dark z-3">
                <div class="container-fluid p-2 d-flex justify-content-between">
                    <div class="header fs-3">
                        <span class="d-none d-sm-block fw-bold">@yield('header')</span>
                        <button class="navbar-toggler d-block d-sm-none mt-1" aria-label="navbar botton" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                            <i class="fa-solid fa-bars fs-1 "></i>
                        </button>
                    </div>
                    <div class="d-flex d-sm-none logo justify-content-between justify-content-sm-center ">
                        <span class=" fs-2 fw-bold "> <span class="text-primary">V</span> Media</span>
                    </div>
                    <div class="mode">
                        <div class="theme">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-10 ">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>Hello every one
                </button>
            </div> -->
            <div class="col-12   sticky-top overflow-y-scroll z-0" style="max-height: 88vh;">
                <div class="" style="height: 100vh;">
                    @yield('content')
                </div>
            </div>
    </section>
@yield('modal')
</body>


<script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
<script>
        const editors=[...document.querySelectorAll('.editor')];
        editors.forEach(editor => {
            ClassicEditor
            .create( editor, {
                licenseKey: '',
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: yjf4l01o2hvl-nohdljl880ze' );
                console.error( error );
            } );
        });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="{{asset('custom_asset/script.js')}}"></script>
@yield('extraJs')
</html>

