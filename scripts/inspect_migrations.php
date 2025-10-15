<?php
$db = __DIR__ . '/../database/database.sqlite';
if (!file_exists($db)) {
    echo "Database file not found: $db\n";
    exit(1);
}
$pdo = new PDO('sqlite:' . $db);
$stmt = $pdo->query('SELECT id, migration, batch FROM migrations ORDER BY id');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['id']}: {$r['migration']} (batch {$r['batch']})\n";
}
