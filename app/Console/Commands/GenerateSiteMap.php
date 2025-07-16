<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Sitemap;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate SiteMap';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    }
}
