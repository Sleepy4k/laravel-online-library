<?php

namespace App\Services\Web\User;

use App\Services\WebService;

class LoanService extends WebService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = $this->borrowInterface->findById($id);

        if (!$loan) {
            toastr()->error('This book is not borrowed.', 'Error');

            return false;
        }

        if ($loan->status == 'returned') {
            toastr()->error('This book has already been returned.', 'Error');

            return false;
        }

        $this->borrowInterface->update($loan->id, ['status' => 'returned']);

        activity('borrow')
            ->causedBy($loan->user)
            ->performedOn($loan)
            ->withProperties($loan)
            ->log($loan->user->name . ' returned ' . $loan->book->title . '.');

        toastr()->success('You have successfully returned this book.', 'Returned');

        return true;
    }
}
