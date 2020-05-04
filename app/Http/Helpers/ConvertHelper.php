<?php

namespace App\Http\Helpers;

class ConvertHelper
{
    /**
     * Конвертирует изображение и возвращает ссылку на результат
     *
     * @param string $from
     * @param string $to
     * @param string $name
     *
     * @return array
     */

    public static function convert($from, $to, $name)
    {
        $constImageFormat = [
            IMAGETYPE_GIF => 'gif',
            IMAGETYPE_JPEG => 'jpeg',
            IMAGETYPE_PNG => 'png',
            IMAGETYPE_WEBP => 'webp',
        ];

        $extension = exif_imagetype($from);

        if (!array_key_exists($extension, $constImageFormat))
            return ['success' => false, 'desc' => 'Неподдерживаемый формат'];

        $format = $constImageFormat[$extension];

        switch ($format) {
            case 'gif':
                $image = imagecreatefromgif($from);
                break;
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($from);
                break;
            case 'png':
                $image = imagecreatefrompng($from);
                break;
            case 'webp':
                $image = imagecreatefromwebp($from);
                break;
            default:
                $image = null;
        }

        if (!$image)
            return ['success' => false, 'desc' => 'Изображение не загружено'];

        switch ($to) {
            case 'gif':
                imagegif($image, public_path() . '\\storage\\' . $name . '.gif');
                $link = public_path() . '\\storage\\' . $name . '.gif';
                break;
            case 'jpg':
            case 'jpeg':
                imagejpeg($image, public_path() . '\\storage\\' . $name . '.jpg');
                $link = public_path() . '\\storage\\' . $name . '.jpg';
                break;
            case 'png':
                imagepng($image, public_path() . '\\storage\\' . $name . '.png');
                $link = public_path() . '\\storage\\' . $name . '.png';
                break;
            case 'webp':
                imagewebp($image, public_path() . '\\storage\\' . $name . '.webp');
                $link = public_path() . '\\storage\\' . $name . '.webp';
                break;
            default:
                $link = null;
        }
        return ['success' => true, 'link' => $link];
    }
}
