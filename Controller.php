<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

class Controller
{

    /**
     * @var string
     */
    private $sendMethod;
    private $user = "douglasssantos";
    private $sort = null;

    public function __construct($sort = "created_at")
    {
        $this->sort = $sort;
    }

    public function ico_sort($sort = "asc")
    {
        if($sort === "asc"){
            return "<svg width='12' height='12' xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path d=\"M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z\"/></svg>";
        }else{
            return "<svg width='12' height='12' xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path d=\"M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z\"/></svg>";
        }
    }

    public function getRepositories()
    {
        $client = new Client();
        $request = new Request('GET', "https://api.github.com/users/douglasssantos/repos");
        $res = $client->sendAsync($request)->wait();
        return $res->getBody()->getContents();
    }

    public function sortDateAsc($a, $b){
        $strA = implode("-", array_reverse( explode("/", $a[$this->sort]) ) );
        $strB = implode("-", array_reverse( explode("/", $b[$this->sort]) ) );

        return ((strtotime($strB) - strtotime($strA)) > 0 ? -1 : 1);
    }

    public function sortDateDesc($a, $b){
        $strA = implode("-", array_reverse( explode("/", $a[$this->sort]) ) );
        $strB = implode("-", array_reverse( explode("/", $b[$this->sort]) ) );

        return strtotime($strB) - strtotime($strA);
    }

    public function sort($arr = [], $orderBy = "asc")
    {
        $getOrderBy = filter_input(INPUT_GET, "order");
        if(isset($_GET['order']))$orderBy = $getOrderBy;
        ($orderBy === "asc" ? usort($arr, ["Controller","sortDateAsc"]) : usort($arr, ["Controller","sortDateDesc"]));
        return $arr;
    }

    public function filter($arr, $arquived, $private)
    {
        if(boolval($arr['archived']) === ($arquived === "on") && boolval($arr['private']) === ($private === "on")) {
            return true;
        }elseif(boolval($arr['archived']) === ($arquived === "on") && ($private === "" || $private === null)){
            return true;
        }elseif(boolval($arr['private']) === ($private === "on") && ($arquived === "" || $arquived === null)){
            return true;
        }elseif(($arquived === "" || $arquived === null) && ($private === "" || $private === null)){
            return true;
        }else {
            return false;
        }
    }
}