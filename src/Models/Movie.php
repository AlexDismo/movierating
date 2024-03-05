<?php

namespace App\Models;

class Movie
{

    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private int $budget,
        private int $age_limit,
        private string $country,
        private int $duration,
        private string $preview,
        private string $createdAt,
        private array $categories = [],
        private array $actors = []
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function categories(): array
    {
        return $this->categories;
    }

    public function actors(): array
    {
        return $this->actors;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function budget(): string
    {
        return $this->budget;
    }

    public function age_limit(): int
    {
        return $this->age_limit;
    }
    public function country(): string
    {
        return $this->country;
    }

    public function duration(): string
    {
        return $this->duration;
    }
    public function preview(): string
    {
        return $this->preview;
    }


    public function createdAt(): string
    {
        return $this->createdAt;
    }


    /**
     * @return array<Review>
     */
//    public function reviews(): array
//    {
//        return $this->reviews;
//    }

//    public function avgRating(): float
//    {
//        $ratings = array_map(function (Review $review) {
//            return $review->rating();
//        }, $this->reviews);
//
//        if (count($ratings) === 0) {
//            return 0;
//        }
//
//        return round(array_sum($ratings) / count($ratings), 1);
//    }
}
