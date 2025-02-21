<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeView extends Command
{
    protected $signature = 'make:view {name}';
    protected $description = 'Create a new Blade view file';

    public function handle()
    {
        $fs = new Filesystem();
        $name = str_replace('.', '/', $this->argument('name'));
        $path = resource_path("views/{$name}.blade.php");

        if ($fs->exists($path)) {
            $this->error("View already exists!");
            return;
        }

        $fs->ensureDirectoryExists(dirname($path));
        $fs->put($path, "<!-- View: {$name} -->");
        $this->info("View created: resources/views/{$name}.blade.php");
    }
}
