public function displaySummary() {
    echo "Your Reading Tracker:\n";
    echo "- Title: \"{$this->title}\"\n";
    echo "- Author: {$this->author}\n";
    echo "- Pages Read: {$this->pagesRead} of {$this->totalPages}\n";
    echo "- Complete: " . ($this->isComplete ? "Yes" : "No") . "\n";
    echo " Summary: You've read " . $this->getProgress(). " of this book.\n";
    echo "\n--\n\n";
}