<?php
$db = __DIR__ . '/../database/database.sqlite';
if (!file_exists($db)) {
    echo "Database file not found: $db\n";
    exit(1);
}
$pdo = new PDO('sqlite:' . $db);
$target = '2025_10_14_000004_create_votes_table';
$stmt = $pdo->prepare('SELECT id, migration, batch FROM migrations WHERE migration = ?');
$stmt->execute([$target]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!count($rows)) {
    echo "No migration record found for $target\n";
    exit(0);
}
foreach ($rows as $r) {
    echo "Deleting migration record: {$r['id']}: {$r['migration']} (batch {$r['batch']})\n";
}
$del = $pdo->prepare('DELETE FROM migrations WHERE migration = ?');
$del->execute([$target]);
echo "Deleted.\n";
