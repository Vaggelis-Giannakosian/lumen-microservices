<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

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
        return $this->successResponse(Author::all());
    }

    /**
     * Show a single author
     * @param string $author
     * @return Response
     */
    public function show($author)
    {
        return $this->successResponse(Author::findOrFail($author));
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

        $validatedData = $this->validateRequest($request, $author);

        $author->update($validatedData);

        return $this->successResponse($author);
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
    private function validateRequest(Request $request, $author = null): array
    {
        $validatedData = $this->validate($request, [
            'name' => ['max:255',Rule::requiredIf( empty($author) )] ,
            'gender' => ['max:255','in:male,female',Rule::requiredIf( empty($author) )],
            'country' => ['max:255',Rule::requiredIf( empty($author) )],
        ]);

        return $validatedData;
    }


}
