<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugins\Filters;

use Wedrix\Watchtower\Resolver\Node;
use Wedrix\Watchtower\Resolver\QueryBuilder;

function apply_comments_ids_filter(
    QueryBuilder $queryBuilder,
    Node $node
): void
{
    $rootAlias = $queryBuilder->rootAlias();

    $ids = $node->args()['queryParams']['filters']['ids'];

    $queryBuilder->andWhere("$rootAlias.id IN (:ids)")
                ->setParameter("ids", $ids);
}