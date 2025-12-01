<?php

namespace App\Console\Commands;

use App\Models\ChangelogEntry;
use Illuminate\Console\Command;

class SyncChangelogFromGit extends Command
{
    protected $signature = 'changelog:sync-from-git';
    protected $description = 'Import recent git commits into the changelog_entries table';

    public function handle(): int
    {
        // Ensure table/columns exist
        if (!\Schema::connection('legacy')->hasTable('changelog_entries')) {
            $this->error('changelog_entries table does not exist. Run /run-changelog-migration first.');
            return self::FAILURE;
        }

        $version = config('app.version', 'v2.0.0');

        $last = ChangelogEntry::whereNotNull('commit_hash')
            ->visible()
            ->orderByDesc('created_on')
            ->orderByDesc('id')
            ->first();

        $fromHash = $last?->commit_hash;

        $format = '%H|%cI|%s';
        $command = $fromHash
            ? "git log {$fromHash}..HEAD --pretty=format:'{$format}'"
            : "git log --pretty=format:'{$format}'";

        $this->info('Running: ' . $command);

        $output = [];
        $exitCode = 0;
        exec('cd ' . escapeshellarg(base_path()) . ' && ' . $command, $output, $exitCode);

        if ($exitCode !== 0) {
            $this->error('git log failed with code ' . $exitCode);
            return self::FAILURE;
        }

        // Oldest first
        $lines = array_reverse($output);
        $created = 0;

        foreach ($lines as $line) {
            if (!trim($line)) {
                continue;
            }

            [$hash, $date, $subject] = array_pad(explode('|', $line, 3), 3, null);
            if (!$hash || !$subject) {
                continue;
            }

            // Skip if already imported
            if (ChangelogEntry::where('commit_hash', $hash)->exists()) {
                continue;
            }

            ChangelogEntry::create([
                'version' => $version,
                'title' => $subject,
                'body' => null,
                'commit_hash' => $hash,
                'created_on' => $date ? new \DateTimeImmutable($date) : now(),
                'created_by' => null,
                'deleted' => 0,
            ]);

            $created++;
        }

        $this->info("Changelog sync complete. Added {$created} entr" . ($created === 1 ? 'y' : 'ies') . '.');
        return self::SUCCESS;
    }
}


