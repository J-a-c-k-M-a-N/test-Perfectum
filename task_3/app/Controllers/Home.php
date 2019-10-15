<?php

namespace App\Controllers;

use App\Models\CommentModel;

class Home extends BaseController
{
	public function index()
	{
		$perPage = 3;

		$model = new CommentModel();

		$data = [
			'comments' => $model->paginate($perPage),
			'pager' => $model->pager
		];

		echo view('form', $data);
	}
}
