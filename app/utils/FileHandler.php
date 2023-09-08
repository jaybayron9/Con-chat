<?php

namespace utils;

class FileHandler {
    public static function handleFileUpload($fileArray, $destinationDirectory) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $maxFileSize = 5 * 1024 * 1024;
    
        $uploadSuccess = true;
        $uploadedFiles = [];

        foreach ($fileArray['name'] as $key => $fileName) {
            if (!empty($fileName)) {
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $uniqueID = uniqid();
                $newFileName = $uniqueID . '.' . $fileExtension;
                $fileSize = $fileArray['size'][$key];
                $fileTmpName = $fileArray['tmp_name'][$key];

                // Validate the file
                $validationResult = self::validateFile($fileExtension, $fileSize, $maxFileSize);
                
                if ($validationResult === true) {
                    $destinationPath = $destinationDirectory . '/' . $newFileName;
                    if (self::copyFile($fileTmpName, $destinationPath)) {
                        $uploadedFiles[] = $newFileName;
                    } else {
                        $uploadSuccess = false;
                    }
                } else {
                    $uploadSuccess = false;
                }
            }
        }

        return ['success' => $uploadSuccess, 'uploadedFiles' => $uploadedFiles];
    }

    private static function validateFile($fileExtension, $fileSize, $maxFileSize) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileExtension, $allowedExtensions)) {
            return "Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.";
        }

        if ($fileSize > $maxFileSize) {
            return "File is too large. Maximum file size allowed is 5 MB.";
        }

        return true; // Validation passed
    }

    private static function copyFile($sourcePath, $destinationPath) {
        if (copy($sourcePath, $destinationPath)) {
            return true;
        } else {
            return false;
        }
    }
} 
