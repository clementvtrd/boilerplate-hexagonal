<?php

namespace Domain\Command\Movie\Create;

use Domain\Collection\Movies;
use Domain\Model\Movie;

/**
 * TODO: remove this file after forking the project.
 */
final readonly class Handler
{
    public function __construct(private Movies $movies)
    {
    }

    public function __invoke(Input $input): void
    {
        $movie = new Movie(
            $input->title,
            $input->description,
            $input->releaseDate,
        );

        $this->movies->add($movie);
    }
}
