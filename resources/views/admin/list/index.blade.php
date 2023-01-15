@extends('admin.layouts.app')
@section('list','active text-white bg-primary')
@section('header','Admin List')
@section('content')
<div class="content-wrapper mt-3">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h3 class="card-title ">User Table</h3>

                <div class="card-tools col-6 col-md-5 col-lg-3">
                    <div class="input-group input-group-sm ">
                        <input type="text" class="form-control " placeholder="Search...." aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
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
                      <th>Address</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>U Si Thu</td>
                      <td>sithu@gmail.com</td>
                      <td>09796789321</td>
                      <td>Yangon</td>
                      <td>
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Daw Yoon Mi Thaw</td>
                      <td>yoon@gmail.com</td>
                      <td>09976777499</td>
                      <td>Yangon</td>
                      <td>
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>U Si Thu</td>
                        <td>sithu@gmail.com</td>
                        <td>09796789321</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Daw Yoon Mi Thaw</td>
                        <td>yoon@gmail.com</td>
                        <td>09976777499</td>
                        <td>Yangon</td>
                        <td>
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                  </tbody>
                </table>
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
@endsection
