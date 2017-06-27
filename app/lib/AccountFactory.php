<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AccountFactory {

 
    
    public static function build($type) {
        // assumes the use of an autoloader
        $product =  $type;
        if (class_exists($product)) {
            return new $product();
        }
        else {
            throw new Exception("Invalid product type given.");
        }
    }
    
    //$myComputer = AccountFactory::build("CreateAccount");
}