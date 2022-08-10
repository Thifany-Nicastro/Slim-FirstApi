<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\CreateBook;
use Fig\Http\Message\StatusCodeInterface;
use App\Application\Validation\CreateBookValidation;

class CreateBookController
{
    public function __construct(
        private CreateBook $createBook,
        private CreateBookValidation $validation
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $body = $request->getParsedBody();



        // $validator = \Respect\Validation\Validator::notEmpty();

        // if (!$validator->validate($body['title'])) {
        //     return $response->withJson(['message' => 'erro'], StatusCodeInterface::STATUS_BAD_REQUEST);
        // }

        // return $response->withJson(['message' => 'ok'], StatusCodeInterface::STATUS_OK);

        
        
        
        if(!$this->validation->validate($body)) {
            return $response->withJson($this->validation->errors(), StatusCodeInterface::STATUS_BAD_REQUEST);
        }

        return $response->withJson(['message' => 'ok'], StatusCodeInterface::STATUS_OK);

        


        // $data = $this->createBook->execute($body['title']);

        // return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
