<?php

namespace KAntwi\Fly\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'fly:publish')]
class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fly:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the Fly Docker files';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'fly-docker']);
        $this->call('vendor:publish', ['--tag' => 'fly-database']);

        file_put_contents(
            $this->laravel->basePath('docker-compose.yml'),
            str_replace(
                [
                    './vendor/k-antwi/fly/runtimes/8.4',
                    './vendor/k-antwi/fly/runtimes/8.3',
                    './vendor/k-antwi/fly/runtimes/8.2',
                    './vendor/k-antwi/fly/runtimes/8.1',
                    './vendor/k-antwi/fly/runtimes/8.0',
                    './vendor/k-antwi/fly/database/mysql',
                    './vendor/k-antwi/fly/database/pgsql'
                ],
                [
                    './docker/8.4',
                    './docker/8.3',
                    './docker/8.2',
                    './docker/8.1',
                    './docker/8.0',
                    './docker/mysql',
                    './docker/pgsql'
                ],
                file_get_contents($this->laravel->basePath('docker-compose.yml'))
            )
        );
    }
}
