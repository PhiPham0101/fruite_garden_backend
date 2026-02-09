@extends('admin.main')

@section('head')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
<form action=""  method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="menu">Tên nhóm sản phẩm:</label>
        <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="Nhập tên nhóm sản phẩm">
      </div>
    </div>
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập nhật nhóm sản phẩm</button>
    </div>

    
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection