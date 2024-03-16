<?php

namespace App\Controllers;

    use App\Kernel\Controller\Controller;
    use App\Services\ActorService;

class ActorController extends Controller
{
    private ActorService $service;

    public function create(): void
    {
        $this->view('admin/actors/add');
    }

    public function add(): void
    {
        $this->view('admin/actors/add');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'age' => ['required'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect('/admin/actors/add');
        }

        $this->service()->store(
            $this->request()->input('name'),
            $this->request()->input('age'),
            $this->request()->input('biography'),
            $this->request()->input('country'),
            $this->request()->file('image'),
        );

        $this->redirect('/admin');
    }

    public function destroy(): void
    {
        $this->service()->destroy($this->request()->input('id'));

        $this->redirect('/admin');
    }

    public function edit(): void
    {
        $this->view('admin/actors/update', [
            'actor' => $this->service()->find($this->request()->input('id')),
        ]);
    }

    public function update() : void
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);

        if (!$validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect("/admin/actors/update?id={$this->request()->input('id')}");
        }

        $this->service()->update(
            $this->request()->input('id'),
            $this->request()->input('name'),
            $this->request()->input('age'),
            $this->request()->input('biography'),
            $this->request()->input('country'),
            $this->request()->file('image'),
        );

        $this->redirect('/admin');
    }

    public function show(): void
    {
        $actor = $this->service()->find($this->request()->input('id'));

        $this->view('actor', [
            'actor' => $actor,
        ], "Actor - {$actor->name()}");
    }

    private function service(): ActorService
    {
        if (!isset($this->service)) {
            $this->service = new ActorService($this->db());
        }

        return $this->service;
    }

    public function actors(): void
    {
        $page = $this->request()->input('page', 1); // Получаем текущую страницу из запроса
        $limit = 10; // Устанавливаем количество актеров на странице
        $offset = ($page - 1) * $limit; // Вычисляем смещение для запроса в базу данных
        $totalActors = $this->service()->count(); // Получаем общее количество актеров

        $actors = $this->service()->getActors($limit, $offset); // Получаем актеров для текущей страницы

        $this->view('actors', [
            'actors' => $actors,
            'page' => $page,
            'totalActors' => $totalActors,
            'limit' => $limit
        ]);
    }

}


