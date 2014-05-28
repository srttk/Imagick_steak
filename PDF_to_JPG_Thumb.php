<?php
/*
Author Sarath
Created : May-27-2014
Convert A pdf to jpg thumb image
*/
function generate_pdf_thumb($file,$page_number=1,$width=100,$height=100){
       if(class_exists('Imagick')){
        try{

            $im = new Imagick($file);
                $im->setImageFormat('jpg');
                $im->setCompression(Imagick::COMPRESSION_JPEG);
                $im->setCompressionQuality(80);
                $im->setImageBackgroundColor('white');
                $im = $im->flattenImages();
                $im->resizeImage($width,$height, Imagick::FILTER_UNDEFINED, 0.9, true);
                //$fileRelativeLocation = self::IMAGE_PREVIEWS_UPLOAD_DIR.preg_replace("/\\.[^.\\s]{3,4}$/", "", $file).'_'.$page_number.'_'.$width.'X'.$height.'.jpg';
                $fileHandle = getcwd();// .'/'. $fileRelativeLocation;
                $im->writeImage($file.'_thum.jpg');// Write to disk
                $im->clear();
                $im->destroy();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
     }
   }

generate_pdf_thumb('PDF.pdf');



?>
