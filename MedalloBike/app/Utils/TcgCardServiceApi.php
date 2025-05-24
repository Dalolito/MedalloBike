<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TcgCardServiceApi
{
    public function getcards(): array
    {
        try {
            $response = Http::timeout(60)->get('http://tcg-merket.shop/api/tcgcards');

            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Exception $e) {
            Log::error('Error fetching cards from API: '.$e->getMessage());

            return [];
        }
    }
}
