@extends('layouts.admin')
@section('title', 'Bài viết')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>QUẢN LÍ BÀI VIẾT </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lí sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('admin.post.create') }}">
                            <i class="fas fa-plus"></i>
                            Thêm
                        </a>
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.post.trash') }}">
                            <i class="fas fa-trash-alt"></i>
                            Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:90px">Hình</th>
                            <th>Tên bài viết</th>
                            <th>Chi tiết bài viết</th>
                            <th>Mô tả</th>
                            <th class="text-center" style="width:200px">Chức năng</th>
                            <th class="text-center" style="width:30px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            @php
                                $args = ['id' => $row->id];
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('images/posts/' . $row->image) }}"class="img-fluid"
                                        alt="{{ $row->image }}">
                                </td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->detail }}</td>
                                <td>{{ $row->description }}</td>
                                <td class="text-center" style="width:220px">
        
                                      <a href=""
                                          class="btn btn-sm btn-success">
                                          <i class="fas fa-toggle-on"></i>
                                      </a>
                                  <a href="" class="btn btn-sm btn-info">
                                      <i class="fas fa-eye"></i>
                                  </a>
                                  <a href=""
                                      class="btn btn-sm btn-primary">
                                      <i class="fas fa-edit"></i>
                                  </a>
                                  <a href=""
                                      class="btn btn-sm btn-danger">
                                      <i class="fas fa-trash"></i>
                                  </a>
                              </td>
                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
