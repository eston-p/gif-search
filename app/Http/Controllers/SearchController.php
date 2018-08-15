<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Resources\SearchResource;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * @var SearchService
     */
    protected $service;

    /**
     * SearchController constructor.
     *
     * @param SearchService $service
     * @return void
     */
    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($term, Request $request)
    {
        $searchTerm = Helpers::removeWhitespace($term);
        $limit = $request->get('limit', config('gif-search-config.default_page_limit'));
        return response()->json($this->service->query($searchTerm, $limit));
    }

}
