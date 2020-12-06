<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    public function __construct()
    {
        //
    }

    /**
     * Show the books list
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show a single book
     * @param string $book
     * @return Response
     */
    public function show($book)
    {

    }

    /**
     * Create a new Book
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the data of a given Book
     * @param Request $request
     * @param string $book
     * @return Response
     */
    public function update(Request $request, $book)
    {

    }

    /**
     * Delete a given Book
     * @param string $book
     * @return Response
     */
    public function destroy($book)
    {

    }


}
