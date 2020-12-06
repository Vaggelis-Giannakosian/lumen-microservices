<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    /**
     * Obtain a list of Authors from the books service
     * @return string
     */
    public function all(){
        return $this->performRequest('GET','books');
    }

    /**
     * Obtain a single Author by their id
     * @return string
     */
    public function find($bookId){
        return $this->performRequest('GET',"/books/$bookId");
    }

    /**
     * Create an author using the author service
     * @return string
     */
    public function create($formData)
    {
        return $this->performRequest('POST','books',$formData);
    }

    /**
     * Update an author using the author service
     * @return string
     */
    public function update($bookId,$formData)
    {
        return $this->performRequest('PATCH',"/books/$bookId",$formData);
    }


    /**
     * Remove an existing author using the author service
     * @return string
     */
    public function destroy($bookId)
    {
        return $this->performRequest('DELETE',"/books/$bookId");
    }

}
