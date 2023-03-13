<?php

namespace App\Services\Web\User;

use App\Services\WebService;

class BorrowService extends WebService
{
    /**
     * Handle the incoming request.
     */
    public function invoke(string $id)
    {
        $book = $this->bookInterface->findById($id);

        if (!$book) {
            toastr()->error('Book not found.', 'Error');

            return false;
        }

        $borrowed = $this->borrowInterface->findByCustomId([['user_id', auth()->id()], ['book_id', $book->id], ['status', 'borrowed']]);

        if ($borrowed) {
            toastr()->error('You have already borrowed this book.', 'Error');

            return false;
        }

        $this->borrowInterface->create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'status' => 'borrowed',
        ]);

        activity('borrow')
            ->causedBy(auth()->user())
            ->withProperties($book)
            ->log(auth()->user()->name . ' borrowed ' . $book->title . '.');

        toastr()->success('You have successfully borrowed this book.', 'Borrowed');

        return true;
    }
}
