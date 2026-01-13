<?php


class Images
{
    const ALLOWED_EXTENSIONS = ["jpg", "jpeg", "png", "gif"];
    const MAX_FILE_SIZE = 2 * 1024 * 1024;
    const MAX_IMAGE_WIDTH = 1920;
    const MAX_IMAGE_HEIGHT = 1024;

    public function upload($image, $finalName, $destination)
    {
        $finalDestination = $destination."/".$finalName;
        move_uploaded_file($image, $finalDestination);
    }

    public function generateRandomName($extension)
    {
        return uniqid().".".$extension;
    }

    public function isValidSize($size)
    {
        if($size > self::MAX_FILE_SIZE) {
            return false;
        }
        return true;
    }

    public function isValidExtension($extension)
    {
        if(!in_array($extension, self::ALLOWED_EXTENSIONS)) {
            return false;
        }
        return true;
    }

    public function isValidProportions($width, $height)
    {
        if($width > self::MAX_IMAGE_WIDTH || $height > self::MAX_IMAGE_HEIGHT) {
            return false;
        }
        return true;
    }

    
}