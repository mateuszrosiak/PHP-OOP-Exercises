<?php
require_once "AbstractLibrary.php";
require_once "Author.php";

class Library extends AbstractLibrary
{
    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function addAuthor(string $authorName): Author
    {
        $author = new Author($authorName);
        $this->authors[] = $author;

        return $author;
    }

    public function addBookForAuthor($authorName, Book $book)
    {
        $author = $this->findAuthor($authorName);

        if($author) {
            $author->addBook($book->getTitle(), $book->getPrice());
        }
    }

    public function getBooksForAuthor($authorName)
    {
        $author = $this->findAuthor($authorName);
        if ($author) {
            return $author->getBooks();
        }
        return [];
    }

    public function search(string $bookName): ?Book
    {
        foreach($this->getAuthors() as $author) {
            foreach($author->getBooks() as $book) {
                if($book->getTitle() === $bookName) {
                    return($book);
                }
            }
        }
        return null;
    }

    public function findAuthor($authorName) {
        foreach($this->getAuthors() as $author) {
            if($author->getName() === $authorName) {
                return $author;
            }
        }
        return null;
    }

    public function print()
    {
        foreach($this->getAuthors() as $author) {
            echo $author->getName()."<br>";
            echo "--------------------"."<br>";
            foreach ($author->getBooks() as $book) {
                echo $book->getTitle()." - ".$book->getPrice()." "."<br>";
            }
        }
    }


}