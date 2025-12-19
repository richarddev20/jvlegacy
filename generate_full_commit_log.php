<?php

// Script to generate comprehensive commit log
$commits = [];
$output = shell_exec('cd /Users/richcopestake/Documents/Rise/jvlegacy && git log --pretty=format:"%H|%an|%ae|%ad|%s" --date=iso --all --reverse');

$lines = explode("\n", trim($output));
foreach ($lines as $line) {
    if (empty($line)) continue;
    $parts = explode('|', $line);
    if (count($parts) >= 5) {
        $commits[] = [
            'hash' => $parts[0],
            'author' => $parts[1],
            'email' => $parts[2],
            'date' => $parts[3],
            'message' => $parts[4]
        ];
    }
}

// Get file stats for each commit
foreach ($commits as &$commit) {
    $stats = shell_exec("cd /Users/richcopestake/Documents/Rise/jvlegacy && git show --stat --pretty=format: --numstat {$commit['hash']} 2>/dev/null");
    $commit['files'] = [];
    $statsLines = explode("\n", trim($stats));
    foreach ($statsLines as $statLine) {
        if (empty($statLine)) continue;
        $parts = preg_split('/\s+/', $statLine);
        if (count($parts) >= 3) {
            $commit['files'][] = [
                'insertions' => $parts[0],
                'deletions' => $parts[1],
                'file' => $parts[2]
            ];
        }
    }
}

echo json_encode($commits, JSON_PRETTY_PRINT);

