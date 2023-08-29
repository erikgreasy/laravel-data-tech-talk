<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;

class PostDTO
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $body,
        public Carbon $publishedAt,
    )
    {
    }
}
