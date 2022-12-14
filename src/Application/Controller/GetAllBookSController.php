<?php

namespace App\Application\Controller;

use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\UseCase\GetAllBooks;
use Fig\Http\Message\StatusCodeInterface;

class GetAllBooksController
{
    public function __construct(
        private GetAllBooks $getAllBooks,
    ) {}

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $this->getAllBooks->execute();

        return $response->withJson($data, StatusCodeInterface::STATUS_OK);
    }
}
