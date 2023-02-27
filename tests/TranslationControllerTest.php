<?php

namespace Ykmar\VueI18nTranslationLoader\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Ykmar\VueI18nTranslationLoader\Controllers\TranslationController;

class TranslationControllerTest extends TestCase
{
    /** @test */
    public function can_transform_translations_for_vuei18n()
    {
        Lang::partialMock()
            ->shouldReceive('get')
            ->with('test')
            ->andReturn($this->getMockedTranslations());

        $translationController = new TranslationController();

        $response = $translationController->transform('test');

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertJson('{"test.test":"This is a test"}');
    }

    private function getMockedTranslations(): array
    {
        return [
            'test' => 'This is a test'
        ];
    }
}
