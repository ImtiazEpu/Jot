<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class AppController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( ['auth','verified'] );
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index() {
        return view( 'home' );
    }
}
