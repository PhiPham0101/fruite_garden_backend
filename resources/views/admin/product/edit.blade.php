@extends('admin.main')

@section('head')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
<form action=""  method="POST">
    <div class="card-body">
       <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="menu">Tên sản phẩm:</label>
              <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Nhóm sản phẩm:</label>
              <select class="form-control" name="menu_id">
                  {{-- <option value="0">Danh mục cha</option> --}}
                  @foreach ($menus as $menu)
                      <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Giá bán:</label>
              <input type="number" name="price" value="{{ $product->price }}"  class="form-control">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Số lượng:</label>
              <input type="number" name="inventory" value="{{ $product->inventory }}"  class="form-control">
           </div>
          </div>         
        </div>
        
          <div class="form-group">
            <label>Mô tả sản phẩm:</label>
            <textarea class="form-control" name="sort_description">{{ $product->sort_description }}</textarea>
          </div>

          <div class="form-group">
            <label>Mô tả chi tiết sản phẩm:</label>
            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
          </div>

          <div class="form-group">
            <label for="menu">Hình ảnh sản phẩm:</label>
            <input type="file" class="form-control" id="upload"></input>
            <div id="image_show">
                <a href="{{ $product->img }}" taget="_blank">
                    <img src="{{ $product->img }}" width="100px">
                </a>
            </div>
            <input type="hidden" name="img" value="{{ $product->img }}" id="img">
        </div>      
    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </div>

    
    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection