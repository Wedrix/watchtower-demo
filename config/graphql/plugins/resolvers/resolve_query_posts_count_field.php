<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugin\ResolverPlugin;

use Wedrix\Watchtower\Resolver\Node;

function resolve_query_posts_count_field(
    Node $node
): mixed
{
    $entityManager = $node->context()['entityManager'];

    return $entityManager->createQuery("SELECT COUNT(post) FROM App\\Entity\\Post post")
                        ->getSingleScalarResult();
}