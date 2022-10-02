<?php


namespace Tests\Acceptance;

use Codeception\Example;
use Tests\Support\Pages\VideoPage;
use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    protected function dataProvider(): array
    {
        return [
            ['text' => 'ураган'],
            ['text' => 'смешарики'],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function videoTest(AcceptanceTester $I, Example $example,VideoPage $videoPage )
    {
        $videoPage->openPage();
        $videoPage->typeSearchText($example['text']);
        $videoPage->submitSearch();
        $I->waitForJS("return $.active == 0;", 30);
        $videoPage->moveMouseToElement(VideoPage::$selectors['searchResults']['firstResult']['image']);
        $I->waitForElement(VideoPage::$selectors['searchResults']['firstResult']['previewDiv']);
        $link = $I->grabAttributeFrom(VideoPage::$selectors['searchResults']['firstResult']['video'], 'src');
        $pattern = '/^https:\/\/video-preview\.s3\.yandex\.net.*\.mp4$/';
        $I->assertRegExp($pattern, $link, "Video tag preview has src matching pattern $pattern");
    }

    public function _after(AcceptanceTester $I)
    {

    }
}
