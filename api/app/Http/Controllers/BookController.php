<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * @var BookService
     */
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Show the books list
     * @return JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->bookService->all());
    }

    /**
     * Show a single book
     * @param string $book
     * @return JsonResponse
     */
    public function show($book)
    {
        return $this->successResponse($this->bookService->find($book));
    }

    /**
     * Create a new Book
     * @param Request $request
     * @param AuthorService $authorService
     * @return JsonResponse
     */
    public function store(Request $request, AuthorService $authorService)
    {

        if( $request->has('author_id'))
        {
            $authorService->find($request->author_id);
        }

        return $this->successResponse(
            $this->bookService->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    /**
     * Update the data of a given Book
     * @param Request $request
     * @param string $book
     * @param AuthorService $authorService
     * @return JsonResponse
     */
    public function update(Request $request, $book,  AuthorService $authorService)
    {
        if( $request->has('author_id'))
        {
            $authorService->find($request->author_id);
        }

        return $this->successResponse($this->bookService->update($book,$request->all()));
    }

    /**
     * Delete a given Book
     * @param string $book
     * @return JsonResponse
     */
    public function destroy($book)
    {
        return $this->successResponse(
            $this->bookService->destroy($book),
            Response::HTTP_NO_CONTENT
        );
    }


}
