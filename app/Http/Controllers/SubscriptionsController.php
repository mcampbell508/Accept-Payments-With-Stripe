<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use Exception;

class SubscriptionsController extends Controller
{
    /**
     * Create a new subscription for the user.
     *
     * @param RegistrationForm $form
     *
     * @return array
     */
    public function store(RegistrationForm $form)
    {
        try {
            $form->save();
        } catch (Exception $e) {
            return response()->json(
                ['status' => $e->getMessage()], 422
            );
        }

        return [
            'status' => 'Success!',
        ];
    }

    /**
     * End a user's subscription.
     *
     * @return \RedirectResponse
     */
    public function destroy()
    {
        auth()->user()->subscription()->cancel();

        return back();
    }
}
