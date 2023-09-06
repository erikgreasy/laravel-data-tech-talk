<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $body,
        public Carbon $publishedAt,
    ) {}
}
