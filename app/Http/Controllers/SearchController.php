<?php

namespace App\Http\Controllers;

use App\Http\Resources\Contact as ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(  ) {

        $data = \request()->validate([
            'searchTerm' => 'required',
        ]);
        $contact =  Contact::search($data['searchTerm'])->get();

        return ContactResource::collection($contact);
    }
}
