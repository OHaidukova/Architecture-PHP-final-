<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23/02/2019
 * Time: 17:18
 */

namespace Model\Repository;


abstract class Repository
{
    abstract public function getRepositoryObject();

    public function getByParams(array $params) {
        $repositoryName = $this->getRepositoryObject();
        return $repositoryName->getDataFromSource($params);
    }
}