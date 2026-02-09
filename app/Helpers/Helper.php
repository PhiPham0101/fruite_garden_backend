<?php

namespace App\Helpers;
use Illuminate\Support\Str;


class Helper
{
    public static function category($categories): string
{
    $html = '';

    foreach ($categories as $category) {
        $html .= '
            <tr>
                <td>' . $category->id . '</td>
                <td>' . $category->name . '</td>
                <td>' . $category->updated_at . '</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/category/edit/' . $category->id . '">
                        <i class="fa-solid fa-pen-to-square"></i> Update
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow(' . $category->id . ', \'/admin/category/destroy\')">
                        <i class="fa-solid fa-trash"></i> Delete
                    </a>
                </td>
            </tr>
        ';
    }

    return $html;
}


    // public static function active($active = 0) : string
    // {
    //     return $active = 0 ? '<span class="btn btn-danger btn-xs">No</span>' 
    //         : '<span class="btn btn-danger btn-xs">Yes</span>';
    // }

    public static function categories($categories)  : string
    {
        $html = '';
        foreach ($categories as $key => $category) {
                $html.= '
                    <li>
                        <a href="/danh-muc/' . $category->id . '-' . Str::slug($category->name, '-') .'.html" </a>
                            ' . $category->name . '
                        </a>';
                    
                        unset($categories[$key]);
                        if(self::isChild($categories, $category->id)){
                            $html .= '<ul class="sub-menu">';
                            $html .= self::categories($categories, $category->id);
                            $html .= '</ul>';
                        }
                        
                        $html .=' 
                    </li>
                '; 
                       
        }
        return $html;
    }

    public static function isChild($categories, $id) : bool
    {
        foreach ($categories as $k => $category) {
            if ($category->parent_id == $id) {
                return true;
            }    
        }
        return false;

    }
}