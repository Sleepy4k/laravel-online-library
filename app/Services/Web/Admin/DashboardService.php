<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class DashboardService extends WebService
{
    /**
     * Handle the incoming request.
     */
    public function invoke()
    {
        return [
            'books' => $this->bookInterface->all(['*'], ['author']),
            'users' => $this->userInterface->all(['id']),
            'authors' => $this->authorInterface->all(['id']),
            'publisher' => $this->publisherInterface->all(['id']),
            'categories' => $this->bookCategoryInterface->all(['id', 'name'], ['books']),
            'loans' => $this->borrowInterface->all(['*'], ['user', 'book']),
            'total_book' => $this->getTableData('books'),
            'total_author' => $this->getTableData('authors'),
            'total_publisher' => $this->getTableData('publishers'),
            'total_user' => $this->getTableData('users'),
        ];
    }
}
