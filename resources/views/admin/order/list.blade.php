@extends('admin.main')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Mã ĐH</th>
                <th>Tổng đơn hàng</th>
                <th>Khách hàng</th>          
                <th>Số SP</th>
                <th>Ngày đặt</th>
                <th>Ghi chú</th>
                <th>Trang thái</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>ĐH: {{ $order->id }}</td>

                <td>
                    {{ $order->details->sum(fn($d) => $d->quantity * $d->product->price) }}
                </td>

                <td>{{ $order->fullName }}</td>

                <td>{{ $order->details->sum('quantity') }}</td>

                <td>{{ $order->created_at->format('d/m/Y') }}</td>

                <td>{{ $order->note }}</td>

                {{-- TRẠNG THÁI --}}
                <td>
                    <form method="POST"
                        action="{{ route('admin.orders.updateStatus', $order->id) }}">
                        @csrf

                        <select name="status"
                                class="form-control form-control-sm"
                                onchange="this.form.submit()"
                                {{ in_array($order->status, ['COMPLETED','CANCELLED']) ? 'disabled' : '' }}>

                            <option value="ORDERED"   {{ $order->status == 'ORDERED' ? 'selected' : '' }}>Đã đặt</option>
                            <option value="CONFIRMED" {{ $order->status == 'CONFIRMED' ? 'selected' : '' }}>Đã xác nhận</option>
                            <option value="SHIPPING"  {{ $order->status == 'SHIPPING' ? 'selected' : '' }}>Đang giao</option>
                            <option value="COMPLETED" {{ $order->status == 'COMPLETED' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="CANCELLED" {{ $order->status == 'CANCELLED' ? 'selected' : '' }}>Hủy</option>
                        </select>
                    </form>
                </td>

                <td>
                    <a class="btn btn-info btn-sm"
                    href="{{ route('admin.orders.show', $order->id) }}">
                        Chi tiết
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $orders->links() !!}
    </div>
    
@endsection