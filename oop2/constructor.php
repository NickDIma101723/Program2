<?php
class anime {
    public $title;
    public $genre;
    public $episodes;

    public function __construct($title, $genre, $episodes) {
        $this->title = $title;
        $this->genre = $genre;
        $this->episodes = $episodes;
    }

    public function getInfo() {
        return "Title: " . $this->title . ", Genre: " . $this->genre . ", Episodes: " . $this->episodes;
    }

}