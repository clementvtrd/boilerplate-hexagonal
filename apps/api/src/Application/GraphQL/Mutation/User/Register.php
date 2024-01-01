<?php

declare(strict_types=1);

namespace Application\GraphQL\Mutation\User;

use Application\BusInterface;
use Application\GraphQL\Type\UserType;
use Domain\Queue\Command\User\Create\Input as CreateUserInput;
use Domain\Queue\Query\User\Find\Input as FindUserInput;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class Register implements MutationInterface
{
    public function __construct(private readonly BusInterface $bus)
    {
    }

    public function __invoke(string $email, string $password): UserType
    {
        $this->bus->dispatch(new CreateUserInput($email, $password));
        $output = $this->bus->ask(new FindUserInput($email));

        return new UserType($output->user);
    }
}
