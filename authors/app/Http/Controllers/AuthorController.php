<?php

namespace App\Http\Controllers;

use App\Models\Author;
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
        return $this->successResponse([
            'authors' => Author::all()
        ],200);
    }

    /**
     * Show a single author
     * @param Author $author
     * @return Response
     */
    public function show( $author )
    {
        return response([
            'author' => Author::findOrFail($author)
        ],200);
    }

    /**
     * Create a new Author
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the data of a given Author
     * @param Request $request
     * @param Author $author
     * @return void
     */
    public function update(Request $request, Author $author)
    {

    }

    /**
     * Delete a given Author
     * @param Request $request
     * @param Author $author
     * @return void
     */
    public function destroy(Request $request, Author $author)
    {

    }


}
