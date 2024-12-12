<?php

namespace App\Helpers;


class File
{
    public $file;
    public $maxSize;
    public $type;
    public $validType;
    public $fileName;

    public function __construct($key, $maxSize, $valid_type)   
    {
        $this->file = $_FILES[$key];
        $this->maxSize = $maxSize;
        $this->validType = $valid_type;
    // debug($this->file);
    }

    public function check()
    {
        if ($this->file['error'] == UPLOAD_ERR_NO_FILE) {
            throw new \Exception('not_file');
        }
    }

    public function checkSize()
    {
        if ($this->file['size'] > $this->maxSize) {
            throw new \Exception('file_size');
        } 
    }

    public function getType() 
    {
        $this->type = pathinfo($this->file['name'], PATHINFO_EXTENSION);
        $this->type = strtolower($this->type);
        
    }

    public function checkType() 
    {
        if (!in_array($this->type, $this->validType)) {
            throw new \Exception('file_type');
        }
    }

    public function createNewName() 
    {
        $this->fileName = time() . '.' . $this->type; 
    }

    public function moveFile($dir)
    {
        $path = $dir . $this->fileName;
        move_uploaded_file($this->file['tmp_name'], $path);
    }

    public function upload($dir)
    {
        $this->check();
        $this->checkSize();
        $this->getType();
        $this->checkType();
        $this->createNewName();
        $this->moveFile($dir);
    }

}