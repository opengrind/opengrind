<?php

namespace App\Domains\Search\Web\Controllers;

use App\Domains\Search\Web\ViewHelpers\SearchIndexViewHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function show(Request $request): View
    {
        $viewModel = SearchIndexViewHelper::data(auth()->user()->organization, $request->get('searchTerm'));

        return view('search.index', [
            'view' => $viewModel,
        ]);
    }
}
