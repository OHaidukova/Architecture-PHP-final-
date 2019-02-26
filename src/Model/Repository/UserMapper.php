<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23/02/2019
 * Time: 22:06
 */

namespace Model\Repository;

use Model;
use Model\Entity;

class UserMapper extends Repository
{

    /**
     * Получаем пользователя по идентификатору
     *
     * @param int $id
     * @return Entity\User|null
     */
    public function getUserById(int $id): ?Entity\User
    {
        $users = $this->getByParams(['id' => $id]);
        foreach ($users as $user) {
            $user = $this->createUser($user);
            return $user;
        }

        return null;
    }

    /**
     * Получаем пользователя по логину
     *
     * @param string $login
     * @return Entity\User
     */
    public function getUserByLogin(string $login): ?Entity\User
    {
        $users = $this->getByParams(['login' => $login]);

        foreach ($users as $user) {
            return $this->createUser($user);
        }

        return null;
    }

    /**
     * Фабрика по созданию сущности пользователя
     *
     * @param array $user
     * @return Entity\User
     */
    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        $user = new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );

        return $user;
    }

    /**
     * Фабричный метод для репозитория User
     *
     * @return Model\Repository\User
     */
    public function getRepositoryObject()
    {
        return new Model\Repository\User();
    }
}