<?php

class Helper {

    static function get_current_Page_URL() {
        $pageURL = isset($_SERVER ['HTTPS']) ? 'https://' : 'http://';
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return strtolower($pageURL);
    }

    static function print_array($array) {
        $arr = array();
        foreach ($array as $k => $v) {
            if (is_array($array[$k])) {
                echo "$k is an array <br/>";
                print_array($array[$k]);
            } else {
                echo "****$k : $v <br/>";
            }
        }
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helper
 *
 * @author memad
 */

