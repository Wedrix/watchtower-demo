<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugin\AuthorizorPlugin;

use Wedrix\Watchtower\Resolver\Node;
use Wedrix\Watchtower\Resolver\Result;

function authorize_user_result(
    Result $result,
    Node $node
): void
{
    $request = $node->context()['request'];

    if (!$request->headers->has('X-TOKEN')) {
        throw new \Exception("Unauthorized");
    }
}