<?php

namespace App\Http\Services\Category;

use App\Models\CategoryModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function getAll(){
        // orderbyDesc sắp xếp theo lớn nhất
        return CategoryModel::orderbyDesc('id')->paginate(20);
    } 

    public function show()
    {
        return CategoryModel::select('name','id')->orderByDesc('id')->get();
    }


    public function create(array $data){
        try {
            CategoryModel::create([
                'name' => (string) $data['name'],
                
            ]);

            Session::flash('success', 'Tạo nhóm hàng hóa thành công');
            return true;

        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        // return true;
    }


    public function update($request, $category): bool
    {
        // $menu->fill($request->input());
        // $menu->save();

        //Phương pháp thủ công
        $category->name = (string) $request->input('name');
        $category->save();
        
        Session::flash('success', 'Cập nhật nhóm sản phẩm thành công');
        return true;
    }

    public function destroy($request){
        try {
            $id = (int) $request->input('id');

            if (!$id) {
                return false;
            }

            CategoryModel::where('id', $id)->delete();
            return true;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function getId($id){
        // return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProducts($menu, $request)
    {
        // $query = $menu->products()
        //     ->select('id', 'name', 'price', 'price_sale', 'thumb')
        //     ->where('active', 1);
            
        //         if($request->input('price')){
        //             $query->orderBy('price', $request->input('price'));
        //         }
            
        //         return $query->orderByDesc('id')
            
        //     ->paginate(12)
        //     ->withQueryString();
    }

}