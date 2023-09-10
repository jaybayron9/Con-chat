<?php

namespace utils;

class FileHandler {
    public static function upload_image($files, $storeDir) { 
        foreach ($files as $key => $value) {  
            for ($i = 0; $i < count($value['size']); $i++) {
                $maxFileSize = 5* 1024 * 1024;
                if ($value['size'][$i] > $maxFileSize) {
                    json(['error' => 'File is too large. Maximum file size allowed is 5 MB.']);
                }

                $fileExtension = strtolower(pathinfo($value['name'][$i], PATHINFO_EXTENSION));
                if (!in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    json(['error' => 'Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed']);
                }

                $newFileName = "$storeDir/" . uniqid() . ".$fileExtension";
                if (!empty($value['name'][$i])) {
                    move_uploaded_file($value['tmp_name'][$i], $newFileName);
                    return true;
                }
            }  
        }
    }
} 
