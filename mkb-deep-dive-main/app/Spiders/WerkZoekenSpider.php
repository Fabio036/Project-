<?php

namespace App\Spiders;

use App\Processors\CvsProcessor;
use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;

class WerkZoekenSpider extends BasicSpider
{
    public array $startUrls = [
        'https://www.werkzoeken.nl/cv-database/?what=&where=&r=30&filtered=1&submit_homesearch='
    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        CvsProcessor::class
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    public function parse(Response $response): Generator
    {
        $links = $response->filter('div[class="vacancies-wrapper"]')
            ->filterXPath('//div[contains(@class, "active")]')->each(function ($node) {
                return $node->filter('a')->attr('href');
            });

        foreach ($links as $link) {
            yield $this->request('GET', $link, 'parseProfile');
        }
    }

    public function parseProfile(Response $response): Generator
    {
        $data = $response->filterXPath('//div[contains(@class, "vacancy-detail")]');

        $url = $response->getUri();

        $topContent = $data->filter('div[class="top-content"]');
        $personData = $topContent->filter('div[class="cv-person-data"]');

        $details = $data->filter('div[class="details"]')->filter('div[class="column"]');

        $result = [
            'preferred_function' => $topContent->filter('h1')->text(),
            'first_name' => $topContent->filter('h2')->text(),
            'location' => $personData->filter('div[class="location"]')->text(),
            'availability' => $personData->filter('div[class="apply"]')->text(),
            'personal' => $details->first()->filter('li')->each(function ($node) {
                return $node->text();
            }),
            'preferences' => $details->last()->filter('li')->each(function ($node) {
                return $node->text();
            }),
            'url' => $url,
        ];

        yield $this->item($result);
    }
}
