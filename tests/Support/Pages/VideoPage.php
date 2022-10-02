<?php

namespace Tests\Support\Pages;

use Tests\Support\AcceptanceTester;

class VideoPage extends BasePage
{
    public static array $selectors = [
        'searchInput' => 'input[name="text"]',
        'searchSubmit' => '.search2 button[type="submit"]',

        'searchResults' => [
            'firstResult' => [
                'image' => 'h1 + .serp-list .serp-item:nth-of-type(1) .thumb-image',
                'previewDiv' => 'h1 + .serp-list .serp-item:nth-of-type(1) .thumb-image .thumb-preview__target_playing',
                'video'=> 'h1 + .serp-list .serp-item:nth-of-type(1) .thumb-image video'
            ],
        ],

        'loader' => '.fade > div.spin2_progress_yes'
    ];

    public function openPage()
    {
        $this->I->amOnPage('/video');
    }

    public function typeSearchText($text)
    {
        $this->I->fillField(self::$selectors['searchInput'], $text);
    }

    public function submitSearch()
    {
        $this->I->click(self::$selectors['searchSubmit']);
    }

    public function moveMouseToElement($selector, $offsetX = 0, $offsetY = 0){
        $this->I->moveMouseOver($selector,$offsetX,$offsetY);
    }
}