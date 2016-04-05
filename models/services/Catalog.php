<?php

namespace app\models\services;

use yii\base\Model;

class Catalog
{

    public function getTree($dir = null, $item = null)
    {
        $dir = $dir.$item;
        $data = scandir($dir);
        $result = array();
        foreach($data as $item){
            if (strpos($item, '.') != 0 || strpos($item, '.') === false) {
                if (is_dir($dir.$item)) {
                    $item .=DIRECTORY_SEPARATOR;
                    $result[$item] = $this->getTree($dir, $item);
                } else {
                    $result[$item] = $item;
                }
            }
        }
        return $result;
    }

    public function getViewTree($dir = null, $item = null, $result = null , $display = null)
    {
        $dir = $dir.$item;
        $d = $item;
        $data = scandir($dir);
        $result .= '<ul '.$display.'>';
        foreach($data as $item){
            if (strpos($item, '.') != 0 || strpos($item, '.') === false) {
                if (is_dir($dir.$item)) {
                    $result .= '<li class="bg-info"><a><span>'.$item.'(Directory)</span></a></li>';
                    $item .=DIRECTORY_SEPARATOR;
//                    $display = 'hidden';
                    $result = $this->getViewTree($dir, $item, $result, $display);
                } else {
                    $result .= '<li class="bg-info"><a href="?r=manager%2Fopen&name='.$d.$item.'">'.$item.'(File)</a></li>';
                }
            }
        }
        $result .= '</ul>';
        return $result;
    }

    public function getFolder($item, $it = null)
    {
        $dir = $item;
        $data = scandir($dir);
//        $result = '<ul class="list-unstyled">';
        $result = null;
        foreach($data as $item){
            if (strpos($item, '.') != 0 || strpos($item, '.') === false) {
                if (is_dir($dir.$item)) {
                    $result .= '<li class="bg-info">
                                <a href="?r=manager%2Fmenu&item='.$it.$item.DIRECTORY_SEPARATOR.'"><span>'.$item.'(Directory)</span></a>
                                <a class="btn-danger" href="?r=manager%2Fdelete&item='.$it.$item.'">Delete</a>
                                </li>';
                } else {
                    $result .= '<li class="bg-info">
                                <a href="?r=manager%2Fmenu&item='.$it.$item.'">'.$item.'(File)</a>
                                <a class="btn-danger" href="?r=manager%2Fdelete&item='.$it.$item.'">Delete</a>
                                </li>';
                }
            }
        }
//        $result .= '</ul>';
        return $result;
    }

    public function getWay($string)
    {
        $result = '';
        foreach ($string as $str){
            if(!empty($str)) { $result .= $str.DIRECTORY_SEPARATOR; }
        }
        return $result;
    }

}
