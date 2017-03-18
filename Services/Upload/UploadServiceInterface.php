<?php


namespace Services\Upload;


interface UploadServiceInterface
{
    public function upload($fileInfo, $destination): string;
}