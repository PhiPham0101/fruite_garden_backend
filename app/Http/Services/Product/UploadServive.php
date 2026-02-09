<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UploadService
{
    public function uploadImage($request){
        // $request->validate([
        //     'images.*' => 'image | mimes:png,jpg,jpeg,webp'
        // ]);
        $request->validate([
            'file' => 'image|mimes:png,jpg,jpeg,webp'
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