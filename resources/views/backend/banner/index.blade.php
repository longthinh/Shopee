@extends('layouts.admin')
@section('title','Banner')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Banner</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
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
            <a class="btn btn-sm btn-danger" href="{{ route('admin.banner.trash') }}">
                <i class="fas fa-trash-alt"></i>
                Thùng rác
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
          <div class="col-md-3">
            <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name">Tên banner</label>
                    <input type="text" value="" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="link">Liên kết</label>
                    <input type="text" value="" name="link" id="link" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="postion">Vị trí</label>
                    <select name="postion" id="postion" class="form-control">
                        <option value="0">None</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="image">Hình</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2">Chưa xuất bản</option>
                        <option value="1">Xuất bản</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" name="create" class="btn btn-success">Thêm banner</button>
                </div>
            </form>
        </div>
        <div class="col-md-9">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width:30px">#</th>
                    <th class="text-center" style="width:90px">Hình</th>
                    <th>Tên</th>
                    <th>Link</th>
                    <th>Position</th>
                    <th class="text-center" style="width:200px">Chức năng</th>
                    <th class="text-center" style="width:30px">ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $row)
                @php
                  $args = ['id' => $row->banner_id]
                @endphp
                <tr>
                    <td class="text-center">
                        <input type="checkbox" id="checkId" value="1" name="checkId[]">
                    </td>
                    <td class="text-center">
                        <img src="{{ asset('images/banners/'.$row->image)}}" class="img-fluid" alt="{{ $row->image}}">
                    </td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->link }}</td>
                    <td>{{ $row->description }}</td>
                    <td class="text-center">
                      @if ($row->status == 1)
                      <a href="{{ route('admin.banner.status', $args ) }}" class="btn btn-sm btn-success">
                          <i class="fas fa-toggle-on"></i>
                      </a>
                      @else
                      <a href="{{ route('admin.banner.status', $args ) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-toggle-off"></i>
                      </a>
                      @endif
                      <a href="{{ route('admin.banner.show', $args ) }}" class="btn btn-sm btn-info">
                          <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('admin.banner.edit', $args ) }}" class="btn btn-sm btn-primary">
                          <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('admin.banner.delete', $args ) }}" class="btn btn-sm btn-danger">
                          <i class="fas fa-trash"></i>
                      </a>
                  </td>
                    <td class="text-center">{{ $row->user_id }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </section>
@endsection