<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24/02/2019
 * Time: 17:08
 */

namespace Maps;

use Model;

final class IdentityMap
{
    private function __construct(){}
    private function __clone() {}
    private function __wakeup() {}

    private static $object;
    private $identityMap = [];

    public function add($entity)
    {
        $key = sprintf('%s.%d', get_class($entity), $entity->getId());
        $this->identityMap[$key] = $entity;
        var_dump($this->identityMap);
    }

    public function getMap(string $class, int $id)
    {
        $key = sprintf('%s.%d', $class, $id);

        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }

        throw new \Exception();
    }

    public static function getIdentityMap(): IdentityMap
    {
        if (null === static::$object) {
            static::$object = new static();
        }
        return static::$object;
    }

}