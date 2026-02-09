@extends('admin.main')

@section('head')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card-body">
       <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="menu">Tên sản phẩm:</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Nhóm sản phẩm:</label>
              <select class="form-control" name="category_id" value="{{ old('name') }}" >
                  {{-- <option value="0">Danh mục cha</option> --}}
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Giá bán:</label>
              <input type="number" name="price" value="{{ old('price') }}"  class="form-control">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Số lượng:</label>
              <input type="number" name="inventory" value="{{ old('inventory') }}"  class="form-control">
           </div>
          </div>
        </div>
        
        <div class="form-group">
            <label>Mô tả sản phẩm:</label>
            <textarea class="form-control" name="sort_description">{{ old('sort_description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết sản phẩm:</label>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            @csrf
            <abel for="menu">Hình ảnh sản phẩm:</abel>
            <input type="file" class="form-control" name="file" id="upload"></input> {{-- id="name" name="images[]" multiple --}}
            {{-- multiple: sử dụng để chọn được nhiều file, còn ngoặc vuông name="images[]" dùng để lưu được nhi --}}
            <div id="image_show">

            </div>
            <input type="hidden" name="img" id="img">
        </div>

        {{-- chia sẻ qua các nền tảng mxh --}}
        {{-- <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Facebook:</label>
              <input type="number" name="facebook" value="{{ old('facebook') }}"  class="form-control">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Instagram:</label>
              <input type="number" name="instagram" value="{{ old('instagram') }}"  class="form-control">
           </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Linkedin:</label>
              <input type="number" name="linkedin" value="{{ old('linkedin') }}"  class="form-control">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Twitter:</label>
              <input type="number" name="linkedin" value="{{ old('linkedin') }}"  class="form-control">
           </div>
          </div>
        </div>    --}}

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>

    @csrf
  </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection