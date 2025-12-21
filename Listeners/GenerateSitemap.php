<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use samdark\sitemap\Sitemap;

class GenerateSitemap
{
    protected $exclude = [
        '/assets',
        '/CNAME',
        '/favicon.ico',
    ];

    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = rtrim($jigsaw->getConfig('baseUrl'), '/');
        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($jigsaw->getOutputPaths())->each(function ($path) use ($baseUrl, $sitemap) {
            if (!$this->shouldExclude($path)) {
                $normalizedPath = str_starts_with($path, '/') ? $path : '/' . $path;
                $url = $normalizedPath === '/' ? $baseUrl : $baseUrl . $normalizedPath;
                $sitemap->addItem($url, time(), Sitemap::WEEKLY);
            }
        });

        $sitemap->write();
    }

    protected function shouldExclude($path)
    {
        foreach ($this->exclude as $pattern) {
            if (str_starts_with($path, $pattern)) {
                return true;
            }
        }
        return false;
    }
}
