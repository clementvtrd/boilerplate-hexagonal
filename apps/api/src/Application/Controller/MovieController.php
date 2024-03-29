<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\BusInterface;
use Domain\Collection\Exception\EntityNotFoundException;
use Domain\Command\Movie\Create;
use Domain\Command\Movie\Delete;
use Domain\Query\Movie\All;
use Domain\Query\Movie\Show;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedJsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * TODO: remove this file after forking the project.
 */
#[Route('/movie', 'movie_')]
final class MovieController
{
    public function __construct(private readonly BusInterface $bus)
    {
    }

    #[Route(name: 'index', methods: Request::METHOD_GET)]
    public function index(): Response
    {
        return new StreamedJsonResponse($this->bus->ask(new All\Input())->movies);
    }

    #[Route(name: 'create', methods: Request::METHOD_POST)]
    public function create(): Response
    {
        try {
            $this->bus->dispatch(new Create\Input(
                'The Shawshank Redemption',
                'Frank Darabont',
                new \DateTimeImmutable('1994-10-14')
            ));
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse(['message' => 'Movie created'], Response::HTTP_CREATED);
    }

    #[Route('/{uuid}', name: 'show', methods: Request::METHOD_GET)]
    public function show(string $uuid): Response
    {
        try {
            $movie = $this->bus->ask(new Show\Input($uuid))->movie;
        } catch (\Throwable $e) {
            if (($previous = $e->getPrevious()) instanceof EntityNotFoundException) {
                return new JsonResponse(['error' => $previous->getMessage()], Response::HTTP_NOT_FOUND);
            }

            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse($movie);
    }

    #[Route('/{uuid}', name: 'delete', methods: Request::METHOD_DELETE)]
    public function delete(string $uuid): Response
    {
        try {
            $this->bus->dispatch(new Delete\Input($uuid));
        } catch (\Throwable $e) {
            if (($previous = $e->getPrevious()) instanceof EntityNotFoundException) {
                return new JsonResponse(['error' => $previous->getMessage()], Response::HTTP_NOT_FOUND);
            }

            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return new Response(status: Response::HTTP_OK);
    }
}
