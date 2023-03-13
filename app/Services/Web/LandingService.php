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
            'books' => $this->bookInterface->all(['*'], ['authors', 'publisher', 'categories']),
            'users' => $this->userInterface->all(['id'])->count(),
            'authors' => $this->authorInterface->all(['id'])->count(),
            'publisher' => $this->publisherInterface->all(['id'])->count(),
            'categories' => $this->bookCategoryInterface->all(['*'], ['books']),
            'total_book' => $this->getTableData('books')
        ];
    }
}
