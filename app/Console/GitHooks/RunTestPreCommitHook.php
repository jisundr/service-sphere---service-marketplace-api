<?php

namespace App\Console\GitHooks;

use Closure;
use Igorsgm\GitHooks\Contracts\PreCommitHook;
use Igorsgm\GitHooks\Exceptions\HookFailException;
use Igorsgm\GitHooks\Git\ChangedFiles;

class RunTestPreCommitHook implements PreCommitHook
{
    /**
     * Get the name of the hook.
     */
    public function getName(): ?string
    {
        return 'Run Test Pre Commit Hook';
    }

    /**
     * Execute the Hook.
     *
     * @param  ChangedFiles  $files  The list of changed files to analyze.
     * @param  Closure  $next  The next hook in the chain to execute.
     * @return mixed|null
     */
    public function handle(ChangedFiles $files, Closure $next)
    {
        $output = shell_exec('php artisan test --env=testing --stop-on-failure');

        if (strpos($output, 'Tests: ') === false) {
            echo "\n";
            echo "❌ Tests failed. Fix the issues before pushing.\n".$output;
            throw new HookFailException('❌ Tests failed. Fix the issues before pushing.');
        }

        echo "\n";
        echo "✅ All tests passed. Proceeding with push.\n";

        // Run the next hook in the chain
        return $next($files);
    }
}
