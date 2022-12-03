<?php

namespace App\Http\Controllers;

use App\Http\Resources\Contact;
use Illuminate\Http\Request;

class BirthdaysController extends Controller {

    /**
     *
     */
    public function index() {
        $contact = request()->user()->contacts()->birthdays()->get();
        return Contact::collection($contact);
    }
}
