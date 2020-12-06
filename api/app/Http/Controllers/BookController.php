<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * @var BookService
     */
    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    /**
     * Show the books list
     * @return JsonResponse
     */
    public function index()
    {
        $response = $this->service->performRequest('get','lumen.books.test/books');
        return $this->successResponse($response);
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
