<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugins\Selectors;

use Wedrix\Watchtower\Resolver\Node;
use Wedrix\Watchtower\Resolver\QueryBuilder;

function apply_post_comments_count_selector(
    QueryBuilder $queryBuilder,
    Node $node
): void
{
    $rootAlias = $queryBuilder->rootAlias();

    $queryBuilder->join("$rootAlias.comments", "comments")
                ->addSelect("COUNT(comments) AS commentsCount");
}