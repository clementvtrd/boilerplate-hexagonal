<?php

declare(strict_types=1);

namespace Tools\PhpStan;

use Application\BusInterface;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\ObjectWithoutClassType;
use PHPStan\Type\Type;

final class QueryBusReturn implements DynamicMethodReturnTypeExtension
{
    public function getClass(): string
    {
        return BusInterface::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'ask' === $methodReflection->getName();
    }

    public function getTypeFromMethodCall(
        MethodReflection $methodReflection,
        MethodCall $methodCall,
        Scope $scope
    ): Type {
        if (0 === \count($methodCall->getArgs())) {
            return new ObjectWithoutClassType();
        }

        $argType = $scope->getType($methodCall->getArgs()[0]->value);

        if (!$argType instanceof ObjectType) {
            return new ObjectWithoutClassType();
        }

        if (0 === preg_match('/^Domain\\\\Queue\\\\Query\\\\(.+)\\\\Input$/', $argType->getClassName(), $matches)) {
            return new ObjectWithoutClassType();
        }

        [, $taskName] = $matches;

        return new ObjectType("Domain\\Queue\\Query\\{$taskName}\\Output");
    }
}
