<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugins\Orderings;

use Wedrix\Watchtower\Resolver\Node;
use Wedrix\Watchtower\Resolver\QueryBuilder;

function apply_comments_newest_ordering(
    QueryBuilder $queryBuilder,
    Node $node
): void
{
    $queryBuilder->addOrderBy("{$queryBuilder->rootAlias()}.publishedAt", 'DESC');
}