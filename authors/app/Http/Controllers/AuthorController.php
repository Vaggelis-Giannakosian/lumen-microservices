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
        return $this->successResponse(Author::all(), 200);
    }

    /**
     * Show a single author
     * @param string $author
     * @return Response
     */
    public function show($author)
    {
        return $this->successResponse(Author::findOrFail($author), 200);
    }

    /**
     * Create a new Author
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);

        $newAuthor = Author::create($validatedData);

        return $this->successResponse($newAuthor, Response::HTTP_CREATED);
    }

    /**
     * Update the data of a given Author
     * @param Request $request
     * @param string $author
     * @return Response
     */
    public function update(Request $request, $author)
    {
        $author = Author::findOrFail($author);

        $validatedData = $this->validateRequest($request);

        $author->update($validatedData);

        return $this->successResponse($author, Response::HTTP_OK);
    }

    /**
     * Delete a given Author
     * @param string $author
     * @return Response
     */
    public function destroy($author)
    {

        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse(null,Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateRequest(Request $request): array
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|max:255',
            'gender' => 'required|in:male,female|max:255',
            'country' => 'required|max:255',
        ]);

        return $validatedData;
    }


}
