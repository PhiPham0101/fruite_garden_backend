<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

// use App\Http\Services\Menu;
use App\Models\CategoryModel;

class ProductAdminService
{
    public function getAll(){
        // orderbyDesc sắp xếp theo lớn nhất
        return CategoryModel::orderbyDesc('id')->paginate(20);
    }

    public function insert($request){
        try {
            $data = $request->except('_token', 'file');

            if ($request->hasFile('file')) {
                $data['img'] = $this->uploadImage($request);
            }

            Product::create($data);

            Session::flash('success', 'Thêm sản phẩm thành công');
            return true;

        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi');
            \Log::error($err->getMessage());
            return false;
        }
        
    }

    public function store($request){

    }

    public function get(){
        return Product::with('category')
                ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product){
        try{
            $product->fill($request->input());
            $product->save();

            Session::flash('success', 'Cập nhật thành công');
        }
        catch(\Exception $err){
            Session::flash('error', 'Lỗi vui lòng thử lại');
            \Log::info($err->getMessage()); 
            return false;
        }

        return true;
    }

    public function delete($request){
        $product = Product::where('id', $request->input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }

        return false;
                
    }

    public function uploadImage($request){
        $request->validate([
            'images.*' => 'image | mimes:png,jpg,jpeg,webp'
        ]);

        if($request->hasFile('file') && $request->file('file')->isValid()){
            try{
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                
                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            }
            catch(\Exception $error){
                return false;
            }
        }

    }
    
}