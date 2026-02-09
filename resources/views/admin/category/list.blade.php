@extends('admin.main')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Name</th>
                <th>Update</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {{-- dấu {!! này dùng để phien dịch ra html, nếu không dùng thì sẽ hiểu là đoạn text --}}
            {!! \App\Helpers\Helper::category($categories) !!}
        </tbody>
    </table>
@endsection