<?php

class ResizeImage
{
    public function __construct()
    {
    }

    public static function resizeToContainer($input_Image_A, $input_Image_B)
    {
        $ratioWidth = $input_Image_A["width"] / $input_Image_B["width"]; //if >1 Image A width>Image B width
        $ratioHeight = $input_Image_A["height"] / $input_Image_B["height"]; //if >0 Image A height>Image B height

        if ($ratioWidth >= 1 && $ratioHeight >= 1) {
            return $input_Image_B;
        }
        if ($ratioWidth > $ratioHeight) {
            return [
                "height" => $ratioHeight * $input_Image_B["height"],
                "width" => $ratioHeight * $input_Image_B["width"],
            ];
        } else {
            return [
                "height" => $ratioWidth * $input_Image_B["height"],
                "width" => $ratioWidth * $input_Image_B["width"],
            ];
        }
    }

    public static function resizeToCover($input_Image_A, $input_Image_B)
    {
        $ratioWidth = $input_Image_A["width"] / $input_Image_B["width"]; // if >1 Image A width > Image B width
        $ratioHeight = $input_Image_A["height"] / $input_Image_B["height"]; // if >0 Image A height > Image B height
        if ($ratioWidth >= 1 && $ratioHeight >= 1) {
            return $input_Image_B;
        }

        if ($ratioWidth > $ratioHeight) {
            return [
                "width" => $input_Image_A["width"],
                "height" =>
                    ($input_Image_B["height"] * $input_Image_A["width"]) /
                    $input_Image_B["width"],
            ];
        } else {
            return [
                "width" =>
                    ($input_Image_B["width"] * $input_Image_A["height"]) /
                    $input_Image_B["height"],
                "height" => $input_Image_A["height"],
            ];
        }
    }
}

$input_Image_A = ["width" => 100, "height" => 300];
$input_Image_B = ["width" => 150, "height" => 600];

$resizedImageBForContainer = ResizeImage::resizeToContainer(
    $input_Image_A,
    $input_Image_B
);
$resizedImageBForCover = ResizeImage::resizeToCover(
    $input_Image_A,
    $input_Image_B
);

echo "Image Dimensions for Conatiner will be Width: " .
    $resizedImageBForContainer["width"] .
    ", Height: " .
    $resizedImageBForContainer["height"] .
    PHP_EOL;

echo "Image Dimensions for Cover will be Width: " .
    $resizedImageBForCover["width"] .
    ", Height: " .
    $resizedImageBForCover["height"] .
    PHP_EOL;

