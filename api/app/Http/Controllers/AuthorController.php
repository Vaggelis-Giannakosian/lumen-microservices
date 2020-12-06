<?php

namespace App\Http\Controllers;


use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
        //
    }

    /**
     * Show the authors list
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show a single author
     * @param string $author
     * @return Response
     */
    public function show($author)
    {

    }

    /**
     * Create a new Author
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the data of a given Author
     * @param Request $request
     * @param string $author
     * @return Response
     */
    public function update(Request $request, $author)
    {

    }

    /**
     * Delete a given Author
     * @param string $author
     * @return Response
     */
    public function destroy($author)
    {

    }


}
