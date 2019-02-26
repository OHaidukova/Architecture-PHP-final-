<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29/01/2019
 * Time: 22:39
 */

namespace Service\Compare;


interface ICompare
{
    public function compare(Array $array): array;

}