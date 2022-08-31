<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseService
{

    protected $data;
    protected $pagination;
    protected $model;

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setPagination(LengthAwarePaginator $pagination): BaseService
    {
        $this->pagination = [
            'total' => $pagination->total(), // всего записей
            'count' => $pagination->count(), // всего на странице
            'limit' => $pagination->perPage(), // лимит страницы
            'current_page' => $pagination->currentPage(), // текущая страница
            'last_page' => $pagination->lastPage() // последняя страница
        ];

        return $this->pagination;
    }

    public static function successMessage($data, $message = null)
    {
        return ['status' => 'success', 'message' => $message, 'data' => $data];
    }

    public static function unsuccessfulMessage($data, $message = null)
    {
        return ['status' => 'error', 'message' => $message, 'data' => $data];
    }


}
