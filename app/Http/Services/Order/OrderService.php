<?php

namespace App\Http\Services\Order;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

// use App\Http\Services\Menu;
use App\Models\CategoryModel;

class OrderService
{
    public function getAll(){
        // orderbyDesc sắp xếp theo lớn nhất
        return CategoryModel::orderbyDesc('id')->paginate(20);
    }

    public function store($request){

    }

    public function get(){
        return Order::with('details')->orderByDesc('id')->paginate(15);
    }

    // public function get()
    // {
    //     return Order::with('details.product')
    //         ->orderByDesc('id')
    //         ->paginate(15);
    // }
    
}