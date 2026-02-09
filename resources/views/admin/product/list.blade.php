@extends('admin.main')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Tên sản phẩm</th>
                <th>Nhóm sản phẩm</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                {{-- <th>Mô tả sản phẩm</th> --}}
                <th>Update</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->inventory }}</td>
                 {{-- <td>{{ $product->description }}</td> --}}
                <td>{{ $product->updated_at }}</td>
                <td> 
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}" >
                        <i class="fa-solid fa-pen-to-square">Update</i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fa-solid fa-trash">Delete</i>
                    </a>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div>
    
@endsection