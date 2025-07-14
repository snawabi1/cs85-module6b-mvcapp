<!DOCTYPE html>
<html>
<head>
    <title>Suggestion Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .suggestion { padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        .high { border-left: 5px solid #ff4444; }
        .medium { border-left: 5px solid #ffaa44; }
        .low { border-left: 5px solid #44ff44; }
    </style>
</head>
<body>
    <h1>Personal Suggestions</h1>
    <?php if (isset($suggestions) && is_array($suggestions)): ?>
        <?php foreach ($suggestions as $suggestion): ?>
            <div class="suggestion <?= strtolower($suggestion->priority) ?>">
                <strong><?= htmlspecialchars($suggestion->text) ?></strong><br>
                <small>Category: <?= htmlspecialchars($suggestion->category) ?> | Priority: <?= htmlspecialchars($suggestion->priority) ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No suggestions available.</p>
    <?php endif; ?>
</body>
</html>