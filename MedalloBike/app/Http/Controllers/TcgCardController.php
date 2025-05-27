<?php

namespace App\Http\Controllers;

use App\Utils\TcgCardServiceApi;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class TcgCardController extends Controller
{
    public function index(): View
    {
        try {
            Log::info('=== TcgCardController START ===');
            
            // Paso 1: Crear instancia del servicio
            Log::info('Creando instancia de TcgCardServiceApi...');
            $tcgCardServiceApi = new TcgCardServiceApi;
            Log::info('Instancia creada exitosamente');
            
            // Paso 2: Obtener datos
            Log::info('Obteniendo datos de la API...');
            $cardsData = $tcgCardServiceApi->getcards();
            Log::info('Datos obtenidos', ['count' => count($cardsData), 'keys' => array_keys($cardsData)]);
            
            // Paso 3: Procesar datos
            Log::info('Procesando datos...');
            $cards = [];

            if (isset($cardsData['data']) && is_array($cardsData['data'])) {
                Log::info('Datos válidos encontrados', ['card_count' => count($cardsData['data'])]);
                
                foreach ($cardsData['data'] as $index => $cardData) {
                    Log::info("Procesando carta {$index}", ['card_data' => $cardData]);
                    
                    $cards[] = [
                        'name' => $cardData['name'] ?? 'Sin nombre',
                        'description' => $cardData['description'] ?? 'Sin descripción',
                        'image' => $cardData['image'] ?? '',
                        'language' => $cardData['language'] ?? 'Sin idioma',
                    ];
                }
            } else {
                Log::warning('No se encontraron datos válidos', ['cardsData' => $cardsData]);
            }

            // Paso 4: Preparar vista
            Log::info('Preparando datos para la vista...');
            $viewData = [
                'title' => __('app.tcg_cards.list.title'),
                'subtitle' => __('app.tcg_cards.list.subtitle'),
                'cards' => $cards,
            ];
            Log::info('Datos preparados', ['card_count' => count($cards)]);

            // Paso 5: Renderizar vista
            Log::info('Renderizando vista tcgCard.index...');
            $view = view('tcgCard.index')->with('viewData', $viewData);
            Log::info('Vista renderizada exitosamente');
            
            Log::info('=== TcgCardController END ===');
            return $view;
            
        } catch (\Exception $e) {
            Log::error('=== ERROR EN TcgCardController ===');
            Log::error('Mensaje: ' . $e->getMessage());
            Log::error('Archivo: ' . $e->getFile());
            Log::error('Línea: ' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            Log::error('=== FIN ERROR ===');
            
            // Re-lanzar la excepción para que Laravel la maneje
            throw $e;
        }
    }
}
