<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'app_movie_')]
class MovieController extends AbstractController
{
    public function __construct(
        private readonly MovieRepository $movieRepository,
        private readonly EntityManagerInterface $entityManager
    ) {}

    #[Route('/', name: 'list')]
    public function index(): JsonResponse
    {
        $movies = $this->movieRepository->findAll();

        return $this->json($movies);
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(): JsonResponse
    {
        $this->movieRepository->save(new Movie(
            'The Matrix',
            'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.'
        ));
        $this->entityManager->flush();

        return $this->json(['message' => 'Movie created!']);
    }

    #[Route('/{id}', name: 'show')]
    public function show(int $id): JsonResponse
    {
        $movie = $this->movieRepository->find($id);

        return $this->json($movie);
    }
}
