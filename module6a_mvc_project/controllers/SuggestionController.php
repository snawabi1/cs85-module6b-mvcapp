<?php

namespace App\Models;

class Suggestion {
    public $text;
    public $category;
    public $priority;

    public function __construct($text, $category = "General", $priority = "Low") {
        $this->text = $text;
        $this->category = $category;
        $this->priority = $priority;
    }

    public function display() {
        return "{$this->text} ({$this->category} - {$this->priority})";
    }
}
