<?php
return [
    // first URL component - default (if any other not found)
    '*' => [
        "/" =>                              ["\App\SiteMain\SiteController", "indexAction"],
        "/site" =>                          ["\App\Site{site}\SiteController", "indexAction"],
        "/site/page" =>                     ["\App\Site{site}\Page{page}\PageController", "indexAction"],
        "/site/page/ctrl" =>                ["\App\Site{site}\Page{page}\Controllers\{ctrl}Controller", "indexAction"],
        "/site/page/ctrl/action" =>         ["\App\Site{site}\Page{page}\Controllers\{ctrl}Controller", "{action}Action"],
    ],
    // first URL component - 'api'
    'api' => [
        "/group/entity/operation" =>        ["\App\ApiPrime\Data{group}\Controllers\{entity}Controller", "{operation}Action"],
    ],
    'v1' => [
        "/group/entity/operation" =>        ["\App\ApiPrime\Data{group}\Controllers\{entity}Controller", "{operation}Action"],
    ],
    'v2' => [
        "/group/entity/operation" =>        ["\App\ApiPrimeV2\Data{group}\Controllers\{entity}Controller", "{operation}Action"],
    ],
];
