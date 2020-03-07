<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Image;

trait UploadTrait
{
public function uploadOne($image, $imageName, $path, $size)
{
$destinationPath = $this->SelectStorage();
       $thumb_img = Image::make($image->getRealPath());
       if (count($size) > 0) {

        list($width, $height) = $size;

        $thumb_img->resize($size[0], $size[1]);
        $thumb_img->save($destinationPath.'/'."$path/thumbs/{$width}_{$height}_".$imageName,80);
       }
       else{
$thumb_img->save($destinationPath.'/'."$path/".$imageName,80);
       }
}

protected function SelectStorage()
{
// Storage disk
return Storage::disk('web')->getAdapter()->getPathPrefix();
}
}