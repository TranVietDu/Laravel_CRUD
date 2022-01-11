<?php

namespace App\Services;

use Illuminate\Http\Request;

class UpImageService{
    
    public function upImage($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('product_image', $new_image);
    }
}