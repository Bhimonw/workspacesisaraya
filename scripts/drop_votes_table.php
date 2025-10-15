<?php
$db = __DIR__ . '/../database/database.sqlite';
if (!file_exists($db)) {
    echo "Database file not found: $db\n";
    exit(1);
}
$pdo = new PDO('sqlite:' . $db);
$tables = [];
$stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%';");
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $tables[] = $row['name'];
}
if (in_array('votes', $tables)) {
    echo "Dropping table 'votes'...\n";
    $pdo->exec('DROP TABLE votes;');
    echo "Dropped.\n";
} else {
    echo "Table 'votes' not found.\n";
}
echo "Existing tables: " . implode(', ', $tables) . "\n";
