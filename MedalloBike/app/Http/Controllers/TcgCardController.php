<?php

namespace App\Http\Controllers;

use App\Utils\TcgCardServiceApi;
use Illuminate\View\View;

class TCGCardController extends Controller
{
    public function index(): View
    {
        $tcgCardServiceApi = new TcgCardServiceApi;
        $cardsData = $tcgCardServiceApi->getcards();

        $cards = [];

        if (isset($cardsData['data']) && is_array($cardsData['data'])) {
            foreach ($cardsData['data'] as $cardData) {
                $cards[] = [
                    'name' => $cardData['name'],
                    'description' => $cardData['description'],
                    'image' => $cardData['image'],
                    'language' => $cardData['language'],
                ];
            }
        }

        $viewData = [
            'title' => __('app.tcg_cards.list.title'),
            'subtitle' => __('app.tcg_cards.list.subtitle'),
            'cards' => $cards,
        ];

        return view('tcgCards.index')->with('viewData', $viewData);
    }
}
