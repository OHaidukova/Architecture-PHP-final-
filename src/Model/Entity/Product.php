<?php

declare(strict_types = 1);

namespace Model\Entity;

class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $count;

    /**
     * @var array
     */
    private $comments;

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     * @param int $count
     * @param array $comments
     */
    public function __construct(int $id = null, string $name = null, float $price = null, int $count = null, array $comments = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
        $this->comments = $comments;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getPurchases()
    {
        return $this->count;
    }

    public function setPurchases($count)
    {
        $this->count = $count;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'purchases' => $this->count,
            'comments' => $this->comments
        ];
    }

    public function setData(int $id = null, string $name = null, float $price = null, int $count = null, array $comments = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
        $this->comments = $comments;
    }

}
