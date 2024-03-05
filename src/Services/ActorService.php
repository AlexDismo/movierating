<?php

namespace App\Services;

use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Review;

class ActorService
{
    public function __construct(
        private DatabaseInterface $db
    ){
    }

    public function store(string $name, string $age, string $biography, string $country, ?UploadedFileInterface $image): false|int
    {
        $filePath = $image->move('actors');

        $actorId = $this->db->insert('actors', [
            'name' => $name,
            'age' => intval($age),
            'biography' => $biography,
            'country' => $country,
            'avatar' => $filePath,
        ]);

        return $actorId;
    }

    public function all(): array
    {
        $actors = $this->db->get('actors');

        return array_map(function ($actor) {
            return new Actor(
                $actor['id'],
                $actor['name'],
                $actor['age'],
                $actor['biography'],
                $actor['country'],
                $actor['avatar'],
            );
        }, $actors);
    }


    public function destroy(int $id): void
    {
        $this->db->delete('actors', [
            'id' => $id,
        ]);
    }

    public function find(int $id): ?Actor
    {
        $actor = $this->db->first('actors', [
            'id' => $id,
        ]);

        if (!$actor) {
            return null;
        }
        return new Actor(
            $actor['id'],
            $actor['name'],
            $actor['age'],
            $actor['biography'],
            $actor['country'],
            $actor['avatar'],

        );
    }

    public function update(int $id, string $name, string $age, string $biography, string $country, ?UploadedFileInterface $image): void
    {
        $data = [
            'name' => $name,
            'age' => intval($age),
            'biography' => $biography,
            'country' => $country,
        ];
        if ($image && ! $image->hasError()) {
            $data['avatar'] = $image->move('actors');
        }

        $this->db->update('actors', $data, [
            'id' => $id,
        ]);
    }

    public function new(): array
    {
        $actors = $this->db->get('actors', [], ['id' => 'DESC'], 10);

        return array_map(function ($actor) {
            return new Actor(
                $actor['id'],
                $actor['name'],
                $actor['age'],
                $actor['biography'],
                $actor['country'],
                $actor['avatar'],
            );
        }, $actors);
    }
}