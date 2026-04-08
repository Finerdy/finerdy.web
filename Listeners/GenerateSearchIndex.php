<?php

namespace App\Listeners;

use DOMDocument;
use DOMXPath;
use TightenCo\Jigsaw\Jigsaw;

class GenerateSearchIndex
{
    protected int $bodyMaxLength = 3000;

    public function handle(Jigsaw $jigsaw): void
    {
        $destination = $jigsaw->getDestinationPath();
        $index = [];

        $jigsaw->getPages()->each(function ($page, $path) use (&$index, $destination) {
            if (! $this->isDocsPath($path)) {
                return;
            }

            $htmlFile = $this->resolveHtmlFile($destination, $path);
            if ($htmlFile === null) {
                return;
            }

            $html = file_get_contents($htmlFile);
            if ($html === false) {
                return;
            }

            [$headings, $body] = $this->extractArticle($html);

            $lang = $page->language ?? 'en';
            $index[] = [
                'id' => $lang . '-' . trim(str_replace('/', '-', $path), '-'),
                'lang' => $lang,
                'url' => rtrim($path, '/') . '/',
                'title' => $page->title ?? '',
                'description' => $page->description ?? '',
                'headings' => $headings,
                'body' => $body,
            ];
        });

        file_put_contents(
            $destination . '/search-index.json',
            json_encode($index, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    protected function isDocsPath(string $path): bool
    {
        return str_starts_with($path, '/docs/')
            || str_starts_with($path, '/es/docs/');
    }

    protected function resolveHtmlFile(string $destination, string $path): ?string
    {
        $candidates = [
            $destination . $path,
            $destination . rtrim($path, '/') . '/index.html',
            $destination . $path . '.html',
        ];

        foreach ($candidates as $candidate) {
            if (is_file($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * @return array{0: array<int, string>, 1: string}
     */
    protected function extractArticle(string $html): array
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $articles = $xpath->query('//article');

        if ($articles === false || $articles->length === 0) {
            return [[], ''];
        }

        $article = $articles->item(0);

        $headings = [];
        foreach ($xpath->query('.//h1 | .//h2 | .//h3', $article) as $node) {
            $text = trim($node->textContent);
            if ($text !== '') {
                $headings[] = $text;
            }
        }

        $body = preg_replace('/\s+/u', ' ', trim($article->textContent)) ?? '';
        if (mb_strlen($body) > $this->bodyMaxLength) {
            $body = mb_substr($body, 0, $this->bodyMaxLength);
        }

        return [$headings, $body];
    }
}
