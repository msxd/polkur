<?php
class model {
    public function __construct() {

        // including library files such as db
        $system_files = scandir('library/');

        if(count($system_files) > 2){
            unset($system_files[0]);
            unset($system_files[1]);
            foreach($system_files as $key => $file){
                $file = str_replace('.php','',$file);
                $this->$file = new $file();
            }
        }

    }
}