<?php


class Book
{
    public string $title;
    public float $price;
    public Author $author;

    /**
     * @return Author
     */


    // TODO Generate getters and setters of properties
    // TODO Generate constructor for all attributes. $author argument of the constructor can be optional
    /**
     * @param string $title
     * @param float $price
     * @param Author $author
     */
    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

}