<?php
// Full Name: Sophia Nawabi
// GitHub Repo: https://github.com/snawabi1/cs85-module3b-createform

// Output prediction: I expect a thank-you message showing name, topic, and email.
// $_POST contents: fullname, email, topic, message
// Reflections: I learned how to sanitize/validate form data using PHP.
// I had to fix a bug where the file was wrong in file during testing 3/ i had it in 3b.
// Surprises: Also going through submission instructions once everything was done I noticed I needed to commit
// as I went along so I moved everything to another file before I was going to send the entire file and added chunks
// this caused a some delay as it was done at last minute. 
// Insights: future note to self: read the sumbission instructions first before assignment instructions.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['fullname'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $topic = htmlspecialchars(trim($_POST['topic'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Validate inputs
    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($topic)) $errors[] = "Topic is required.";
    if (str_word_count($message) < 50 || str_word_count($message) > 150) {
        $errors[] = "Message must be between 50 and 150 words.";
    }

    // Show thank-you or errors
    if (empty($errors)) {
        echo "<h3>Thank you, $name!</h3>";
        echo "<p>We received your message about: \"$topic\"</p>";
        echo "<p>We'll get back to you at $email.</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!-- HTML Contact Form -->
<form action="" method="POST">
    <label for="fullname">Full Name:</label><br>
    <input type="text" id="fullname" name="fullname" required><br><br>

    <label for="email">Email Address:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="topic">Topic of Message:</label><br>
    <input type="text" id="topic" name="topic" required><br><br>

    <label for="message">Message (50–150 words):</label><br>
    <textarea id="message" name="message" rows="6" cols="50" required></textarea><br><br>

    <input type="submit" value="Send Message">
</form>
