
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('uuid')) {
  function uuid() { return bin2hex(random_bytes(16)); }
}

if (!function_exists('cat_label')) {
  function cat_label($key){
    $map = array('SCHOOL'=>'โรงเรียน','HOSPITAL'=>'โรงพยาบาล','TEMPLE'=>'วัด');
    return isset($map[$key]) ? $map[$key] : $key;
  }
}
