<?php

namespace App\Services\Web;

use App\Services\WebService;

class LandingService extends WebService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        return [
            'books' => $this->bookInterface->all(['*'], ['author', 'publisher', 'category']),
            'users' => $this->userInterface->all(['id'], [], [], 'created_at', true, ['user'])->count(),
            'authors' => $this->authorInterface->all(['id'])->count(),
            'publisher' => $this->publisherInterface->all(['id'])->count(),
            'categories' => $this->bookCategoryInterface->paginate(10, ['*'], ['books']),
            'total_book' => $this->getTableData('books')
        ];
    }
}
