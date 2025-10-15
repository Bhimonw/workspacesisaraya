<?php
$db = __DIR__ . '/../database/database.sqlite';
$pdo = new PDO('sqlite:' . $db);
$target = '2025_10_14_000004_create_votes_table';
$del = $pdo->prepare('DELETE FROM migrations WHERE migration = ?');
$del->execute([$target]);
echo "Deleted any record for $target\n";
$rows = $pdo->query('SELECT migration, batch FROM migrations ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) echo "{$r['migration']} (batch {$r['batch']})\n";
