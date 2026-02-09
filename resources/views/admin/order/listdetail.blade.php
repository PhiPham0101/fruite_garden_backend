@extends('admin.main')

@section('content')
    {{-- <div class="card mb-4">
        <div class="card-body">
            <form method="POST"
                action="{{ route('admin.orders.updateStatus', $order->id) }}"
                class="row g-3 align-items-end">
                @csrf

                <div class="col-md-6">
                    <label class="form-label">Trạng thái đơn hàng</label>
                    <select name="status" class="form-control">
                        <option value="ORDERED"   {{ $order->status == 'ORDERED' ? 'selected' : '' }}>Đã đặt</option>
                        <option value="CONFIRMED" {{ $order->status == 'CONFIRMED' ? 'selected' : '' }}>Đã xác nhận</option>
                        <option value="SHIPPING"  {{ $order->status == 'SHIPPING' ? 'selected' : '' }}>Đang giao</option>
                        <option value="COMPLETED" {{ $order->status == 'COMPLETED' ? 'selected' : '' }}>Hoàn thành</option>
                        <option value="CANCELLED" {{ $order->status == 'CANCELLED' ? 'selected' : '' }}>Hủy</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        Cập nhật trạng thái
                    </button>
                </div>
            </form>
        </div>
    </div> --}}

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                {{-- <th>Ghi chú</th> --}}
                {{-- <th style="width:100px">&nbsp;</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $detail)
            <tr>
                <td>Đơn hàng: {{ $order->id }}</td>
                <td>{{ $detail->product->name }}</td>
                <td>{{ number_format($detail->product->price) }}</td>
                <td>{{ $detail->quantity }}</td>
                {{-- <td>{{ $detail->order->note }}</td> --}}
            </tr>
            @endforeach

        </tbody>
    </table>  
    
@endsection