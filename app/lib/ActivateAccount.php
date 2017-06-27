<?php
namespace App\Lib;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 use App\UsersInfo;
 use DB;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Config;

class ActivateAccount {
    public $length;
    public function __construct($length) {
        $this->length = $length;
    }
}