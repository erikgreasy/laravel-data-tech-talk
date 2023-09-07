<?php

namespace App\Data;

use App\Models\Post;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Before;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[MapName(SnakeCaseMapper::class)]
#[TypeScript]
class PostData extends Data
{
    public function __construct(
        public string $title,

        #[Unique(Post::class, 'slug')]
        public string $slug,

        public string $body,

        #[Date]
        #[Before('now')]
        public Carbon $publishedAt,
    ) {}
}
