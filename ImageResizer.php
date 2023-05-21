<?php 

  class ResizeImage{

    public function __construct(){

    }

    /*public static function  resizeToContainer($input_Image_A, $input_Image_B){
      $getRatioOfImageA = $input_Image_A['width'] / $input_Image_A['height'];
      $getRatioOfImageB = $input_Image_B['width'] / $input_Image_B['height'];
      
      if ($getRatioOfImageB > $getRatioOfImageA) {
        // if image-B is wider then resize width to fit Image-A
        $newImageWidthForB = $input_Image_A['width'];
        $newImageHeightForB = $newImageWidthForB / $getRatioOfImageB;
      } else {
        // if image-B is taller then resize height to fit Image-A
        $newImageHeightForB = $input_Image_A['height'];
        $newImageWidthForB = $newImageHeightForB * $getRatioOfImageB;
      }
      
      return ['width' => $newImageWidthForB, 'height' => $newImageHeightForB];
    }*/

    public static function resizeToContainer($input_Image_A, $input_Image_B)
    {
        $getRatioOfImageA = $input_Image_A['width'] / $input_Image_A['height'];
        $getRatioOfImageB = $input_Image_B['width'] / $input_Image_B['height'];

        if ($getRatioOfImageB > $getRatioOfImageA) {
            // if Image B is wider, resize width to fit Image A
            $newImageWidthForB = $input_Image_A['width'];
            $newImageHeightForB = $newImageWidthForB / $getRatioOfImageB;

            if ($newImageHeightForB > $input_Image_A['height']) {
                // If the calculated height is still greater than Image A's height,
                // resize height to fit Image A instead
                $newImageHeightForB = $input_Image_A['height'];
                $newImageWidthForB = $newImageHeightForB * $getRatioOfImageB;
            }
        } else {
            // if Image B is taller, resize height to fit Image A
            $newImageHeightForB = $input_Image_A['height'];
            $newImageWidthForB = $newImageHeightForB * $getRatioOfImageB;

            if ($newImageWidthForB > $input_Image_A['width']) {
                // If the calculated width is still greater than Image A's width,
                // resize width to fit Image A instead
                $newImageWidthForB = $input_Image_A['width'];
                $newImageHeightForB = $newImageWidthForB / $getRatioOfImageB;
            }
        }

        return ['width' => $newImageWidthForB, 'height' => $newImageHeightForB];
    }

    public static function resizeToCover($input_Image_A, $input_Image_B)
    {
      $getRatioOfImageA = $input_Image_A['width'] / $input_Image_A['height'];
      $getRatioOfImageB = $input_Image_B['width'] / $input_Image_B['height'];

      if ($getRatioOfImageB > $getRatioOfImageA) {
          // if Image B is wider, resize width to cover Image A
          $newImageWidthForB = $input_Image_A['width'];
          $newImageHeightForB = $newImageWidthForB / $getRatioOfImageB;
      } else {
          // if Image B is taller, resize height to cover Image A
          $newImageHeightForB = $input_Image_A['height'];
          $newImageWidthForB = $newImageHeightForB * $getRatioOfImageB;

          if ($newImageWidthForB < $input_Image_A['width']) {
              // If the calculated width is still less than Image A's width,
              // resize width to cover Image A instead
              $newImageWidthForB = $input_Image_A['width'];
              $newImageHeightForB = $newImageWidthForB / $getRatioOfImageB;
          }
      }

      return ['width' => $newImageWidthForB, 'height' => $newImageHeightForB];
    }
  }

  $input_Image_A  = array("width"=>100,"height"=>300);
  $input_Image_B  = array("width"=>150,"height"=>600);

  $resizedImageBForContainer = ResizeImage::resizeToContainer($input_Image_A, $input_Image_B);
  $resizedImageBForCover = ResizeImage::resizeToCover($input_Image_A, $input_Image_B);

  echo "Image Dimensions for Conatiner will be Width: " . $resizedImageBForContainer['width'] . ", Height: " . $resizedImageBForContainer['height'].PHP_EOL;

  echo "Image Dimensions for Cover will be Width: " . $resizedImageBForCover['width'] . ", Height: " . $resizedImageBForCover['height'].PHP_EOL;


  $input_Image_A  = array("width"=>250,"height"=>500);
  $input_Image_B  = array("width"=>500,"height"=>90);

  $resizedImageBForContainer = ResizeImage::resizeToContainer($input_Image_A, $input_Image_B);
  $resizedImageBForCover = ResizeImage::resizeToCover($input_Image_A, $input_Image_B);

  echo "Image Dimensions for Conatiner will be Width: " . $resizedImageBForContainer['width'] . ", Height: " . $resizedImageBForContainer['height'].PHP_EOL;

  echo "Image Dimensions for Cover will be Width: " . $resizedImageBForCover['width'] . ", Height: " . $resizedImageBForCover['height'].PHP_EOL;

?>