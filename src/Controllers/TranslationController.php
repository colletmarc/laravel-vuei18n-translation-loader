<?php

namespace Ykmar\VueI18nTranslationLoader\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;

class TranslationController extends Controller
{
    public function transform(string $translationName): JsonResponse
    {
        return Response::json($this->format(Lang::get($translationName), $translationName));
    }

    private function format(array $translations, string $translationName): array
    {
        $result = [];
        foreach ($translations as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->format($value, $translationName . '.' . $key));
            } else {
                $result[$translationName . '.' . $key] = preg_replace('/(\:)([a-zA-Z]+)/', '{$2}', $value);
            }
        }

        return $result;
    }
}
