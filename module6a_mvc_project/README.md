# cs85-module6a-mvcapp

## Description

This is a **Suggestion Tracker** built in PHP for CS 85 - Module 6A.  
The project uses the MVC (Model-View-Controller) architecture and Composer’s PSR-4 autoloading to keep the code clean and organized.

It allows users to input personal suggestions (like goals or habits), and the app processes the input and displays it using a model, view, and controller.

## Setup Instructions

1. Place the project folder in your `htdocs` directory under XAMPP.
2. Open a terminal in the project root and run:

   ```bash
   composer dump-autoload
   ```
3. Start Apache in your XAMPP Control Panel.
4. Visit the app in your browser:  
   `http://localhost/cs85_projects/module6a_mvc_project/public/index.php?text=Read+a+book&category=Personal&priority=High`

## Reflection and AI Critique

### Reflection
I chose the suggestion tracker because I wanted something simple but practical that ties into real life. It’s an app that lets users enter goals or tasks, and it displays them in a clear, readable format. I thought it was a good way to practice MVC structure in a way that wasn’t overwhelming.

Building this helped me understand how to separate concerns between the model (data), view (output), and controller (logic). The hardest part was setting up Composer with PSR-4 autoloading. At first, I ran into namespace and folder errors because I didn’t follow the naming exactly. Once I figured that out, it all started to work better.

This assignment also made me more confident using classes and organizing my files. I understand now why developers use MVC — it keeps things cleaner and easier to update.


## AI Code Review and Critique

### Prompt
Create a method in PHP that displays a formatted suggestion with the text, category, and priority.

### AI Output
public function getFormattedSuggestion() {
    return "{$this->text} ({$this->category}, Priority: {$this->priority})";
}
### Critique:
The AI gave me a basic structure that worked without errors. But the formatting wasn’t great — it didn’t look polished for users. I updated it to include punctuation and clearer labeling:
public function getFormattedSuggestion() {
    return "{$this->text}. Category: {$this->category}, Priority: {$this->priority}.";
}
Using AI saved me time and gave me a good starting point, but it didn’t think about user readability. I learned that AI is useful for writing code fast, but I still need to review and improve it myself.

