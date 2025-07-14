<?php

namespace App\Controllers;

use App\Models\Suggestion;

class SuggestionController
{
    public function handle()
    {
        // Create some sample suggestions
        $suggestions = [
            new Suggestion("Learn a new programming language", "Education", "High"),
            new Suggestion("Exercise for 30 minutes daily", "Health", "Medium"),
            new Suggestion("Read a book every month", "Personal", "Medium"),
            new Suggestion("Practice cooking new recipes", "Lifestyle", "Low")
        ];

        // Include the view and pass the suggestions
        include __DIR__ . '/../../views/suggestions.php';
    }
}