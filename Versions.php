<?php


namespace Volandku\Versions;



class Versions
{
    public static function correctUrl($rawurl)
    {
        $url=$rawurl;
        if (mb_substr($url,0,4)!='http') $url='http://'.$url;
        if (mb_substr($url,mb_strlen($url)-1,1)!='/') $url=$url.'/';
        return $url;
    }
    public static function checkJoomla($rawurl)
    {
        $urlxml=self::correctUrl($rawurl).'administrator/manifests/files/joomla.xml';
        $filexml=new \SimpleXMLElement(file_get_contents($urlxml));
        $v=(string)$filexml->version[0];
        if (!empty($v)) return $v; else return false;
    }
}