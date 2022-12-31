<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugin\OrderingPlugin;

use Wedrix\Watchtower\Resolver\Node;
use Wedrix\Watchtower\Resolver\QueryBuilder;

function apply_posts_newest_ordering(
    QueryBuilder $queryBuilder,
    Node $node
): void
{
    $queryBuilder->addOrderBy("{$queryBuilder->rootAlias()}.publishedAt", 'DESC');
}