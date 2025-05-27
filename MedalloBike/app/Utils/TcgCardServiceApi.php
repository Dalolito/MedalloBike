<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TcgCardServiceApi
{
    public function getcards(): array
    {
        try {
            // Aumentar timeout y agregar retry
            $response = Http::timeout(200)
                ->retry(3, 100)
                ->get('http://tcg-merket.shop/api/tcgcards');

            if ($response->successful()) {
                return $response->json() ?? [];
            }

            // Log del error si la respuesta no es exitosa
            Log::error('TCG API Error: HTTP ' . $response->status());
            return [];
            
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('TCG API Connection Error: ' . $e->getMessage());
            return [];
        } catch (\Exception $e) {
            Log::error('Error fetching cards from API: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return [];
        }
    }
}
