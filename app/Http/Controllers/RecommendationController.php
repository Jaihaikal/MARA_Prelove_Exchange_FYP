<?php

namespace App\Http\Controllers;
use App\Services\CollaborativeFilteringService;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    protected $collaborativeFilteringService;

    public function __construct(CollaborativeFilteringService $collaborativeFilteringService)
    {
        $this->collaborativeFilteringService = $collaborativeFilteringService;
    }

    public function index()
    {
        $userId = auth()->id(); // Get the logged-in user ID
        $recommendations = $this->collaborativeFilteringService->getRecommendations($userId);

        return view('recommendations.index', [
            'products' => \App\Models\Product::whereIn('id', $recommendations)->get(),
        ]);
    }
}
