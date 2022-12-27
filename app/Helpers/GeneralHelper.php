<?php

use App\Models\Page;
use App\Models\Setting;
use App\Models\Icon;
use App\Models\Product;
use Illuminate\Http\Request;

const REQUEST_SERVICE_MAIL = 'admin@app.com';
const QUOTE_MAIL = 'admin@app.com';

if (!function_exists('getRoute')) {
    function getRoute($route, $params = null)
    {
        if ($params === null)
        {
            $params = [app()->getLocale()];
        }
        else
        {
            if (gettype($params) == 'array')
            {
                array_unshift($params, app()->getLocale());
            }
            else
            {
                $params = [app()->getLocale(), $params];
            }
        }
        return route($route, $params);
    }
}
if(!function_exists('validate_image'))
{
    function validate_image()
    {
      return 'image';
    }
}
if (!function_exists('upload_image'))
 {
    function upload_image($file, $prefix , $folder)
    {
        if ($file)
        {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/". $folder ."/" . $imageName;
            $files->move('storage'."/".$folder, $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}
//return main setting of website(name , email , phone , ....)
if (!function_exists('setting'))
{
    function setting()
    {
        return Setting::withTranslation()->first();
    }
}
//retrieve desc of all sections
if (!function_exists('pages'))
{
    function pages($page)
    {
        return Page::withTranslation()->where('identifier',$page)->first();
    }
}
//retrieve all icons
if (!function_exists('icons'))
{
    function icons()
    {
        return Icon::get();
    }
}
//return pagination number for pagination in dashboard
if (!function_exists('paginationNumber'))
{
    function paginationNumber()
    {
        return 10;
    }
}

if (!function_exists('upload_img')) {
    function upload_img($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/" . $imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}

if (!function_exists('product_details')) {
    function product_details($id)
    {
        return Product::findOrFail($id);
    }
}
