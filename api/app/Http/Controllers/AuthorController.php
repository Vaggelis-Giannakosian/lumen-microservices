<?php

namespace App\Http\Controllers;


use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * @var AuthorService
     */
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Show the authors list
     * @return JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->authorService->all());
    }

    /**
     * Show a single author
     * @param string $author
     * @return JsonResponse
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->find($author));
    }

    /**
     * Create a new Author
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return $this->successResponse(
            $this->authorService->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    /**
     * Update the data of a given Author
     * @param Request $request
     * @param string $author
     * @return JsonResponse
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->update($author,$request->all()));
    }

    /**
     * Delete a given Author
     * @param string $author
     * @return JsonResponse
     */
    public function destroy($author)
    {
        return $this->successResponse(
            $this->authorService->destroy($author),
            Response::HTTP_NO_CONTENT
        );
    }


}
