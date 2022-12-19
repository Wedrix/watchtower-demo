<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugins\Authorizors;

use Wedrix\Watchtower\Resolver\Node;

function authorize_user_node(
    Node $node
): void
{
    $request = $node->context()['request'];

    if (!$request->headers->has('X-TOKEN')) {
        throw new \Exception("Unauthorized");
    }
}