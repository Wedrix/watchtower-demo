<?php

declare(strict_types=1);

namespace Wedrix\Watchtower\Plugin\MutationPlugin;

use App\Entity\Post;
use App\Entity\User;
use Wedrix\Watchtower\Resolver\Node;

function call_create_post_mutation(
    Node $node
): mixed
{
    $entityManager = $node->context()['entityManager'];

    $title = $node->args()['title'];
    $content = $node->args()['content'];
    $author = $entityManager->find(User::class, id: $node->args()['authorId']);

    $post = new Post;
    $post->setTitle($title);
    $post->setContent($content);
    $post->setAuthor($author);
    $post->setSlug(strtolower(implode('-',explode(' ', $title))));
    $post->setSummary(substr($content,max(strlen($content), 15)));

    $entityManager->persist($post);

    $entityManager->flush();

    return [
        '__typename' => "SuccessfulPostResponse",
        'status' => "SUCCESSFUL",
        'createdPost' => [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'slug' => $post->getSlug(),
            'summary' => $post->getSummary(),
            'content' => $post->getContent(),
            'publishedAt' => $post->getPublishedAt(),
            'commentsCount' => 0
        ]
    ];
}