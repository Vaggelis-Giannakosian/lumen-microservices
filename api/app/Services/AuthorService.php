<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Obtain a list of Authors from the authors service
     * @return string
     */
    public function all(){
        return $this->performRequest('GET','authors');
    }

    /**
     * Obtain a single Author by their id
     * @return string
     */
    public function find($authorId){
        return $this->performRequest('GET',"/authors/$authorId");
    }

    /**
     * Create an author using the author service
     * @return string
     */
    public function create($formData)
    {
        return $this->performRequest('POST','authors',$formData);
    }

    /**
     * Update an author using the author service
     * @return string
     */
    public function update($authorId,$formData)
    {
        return $this->performRequest('PATCH',"/authors/$authorId",$formData);
    }


    /**
     * Remove an existing author using the author service
     * @return string
     */
    public function destroy($authorId)
    {
        return $this->performRequest('DELETE',"/authors/$authorId");
    }


}
