<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function get(){
        return Slider::orderByDesc('id')->paginate(20);
    }

    public function insert($request){
        try{
            $request->except('_token');
            Slider::create($request->input());

            Session::flash('success','Thêm slider thành công');
        }
        catch (\Exception $err) {
            Session::flash('error','Thêm Slider lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    

    public function update($request, $slider){
        try{
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success','Cập nhật Slider thành công');
        }
        catch (\Exception $err) {
            Session::flash('error','Cập nhật Slider lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request){
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            // $path = parse_url($slider->thumb, PHP_URL_PATH); // Lấy phần path từ URL
            // $relativePath = str_replace('/storage/', '', $path); 
            // if (Storage::disk('public')->exists($relativePath)) {
            //     Storage::disk('public')->delete($relativePath);
            // }
            // $path = str_replace('storage', 'public', $slider->thumb);
            //Storage::delete($path);
            Storage::delete($slider->thumb);
            $slider->delete();
            return true;
        }

        return false;
                
    }

    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }

}