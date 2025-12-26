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
        '/robots',
    ];

    public function handle(Jigsaw $jigsaw)
    {
        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        $jigsaw->getPages()->each(function ($page, $path) use ($sitemap) {
            if (!$this->shouldExclude($path)) {
                $sitemap->addItem($page->getUrl(), time(), Sitemap::WEEKLY);
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
