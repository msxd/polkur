<?php
class Url {
    private $domain;

    public function __construct(){
        $this->domain = CONF_HOST;
    }

    public function link($controller_action,$get_string = null){
        $array = explode('/',$controller_action);
        $controller = $array[0];
        $action = $array[1];

        $link = $this->domain."/?controller=$controller&action=$action";

        if($get_string)
            $link .= "&$get_string";

        return $link;
    }
}