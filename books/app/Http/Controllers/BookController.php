<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

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
        return $this->successResponse(Book::all());
    }

    /**
     * Show a single book
     * @param string $book
     * @return Response
     */
    public function show($book)
    {
        return $this->successResponse(Book::findOrFail($book));
    }

    /**
     * Create a new Book
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);
        $newBook = Book::create($validatedData);

        return $this->successResponse($newBook, Response::HTTP_CREATED);
    }

    /**
     * Update the data of a given Book
     * @param Request $request
     * @param string $book
     * @return Response
     */
    public function update(Request $request, $book)
    {
        $book = Book::findOrFail($book);
        $validatedData = $this->validateRequest($request, $book);

        $book->update($validatedData);

        return $this->successResponse($book);
    }

    /**
     * Delete a given Book
     * @param string $book
     * @return Response
     */
    public function destroy($book)
    {
        $book = Book::findOrFail($book);
        $book->delete();

        return $this->successResponse(null,Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateRequest(Request $request, $book=null): array
    {
        $validatedData = $this->validate($request, [
            'title' => ['max:255',Rule::requiredIf( empty($book) )],
            'description' => ['max:255',Rule::requiredIf( empty($book) )],
            'price' => ['int','min:1',Rule::requiredIf( empty($book) )],
            'author_id' => ['int','min:1',Rule::requiredIf( empty($book) )],
        ]);

        return $validatedData;
    }

}
