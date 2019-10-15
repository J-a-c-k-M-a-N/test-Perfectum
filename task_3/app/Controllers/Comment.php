<?php

namespace App\Controllers;

use App\Models\CommentModel;

/**
 * Class Comment
 * @package App\Controllers
 */
class Comment extends BaseController
{

	/**
	 * Create comment
	 * @return bool|false|string
	 * @throws \ReflectionException
	 */
	public function index()
	{
		if ($this->request->isAJAX()) {

			$post = $this->request->getPost('json');
			$dataForm = json_decode($post, true);

			$commentModel = new CommentModel();

			if ($commentModel->validate($dataForm)) {

				$data = self::setNameByEmail($dataForm);

				if (!$commentModel->save($data)) {
					print_r($data);die;
					throw new \Exception();
				}

				return json_encode(['status' => "Success"]);

			} else {

				$errors = $commentModel->errors();
				$errorsJson = json_encode($errors);

				return $errorsJson;
			}
		}
		return false;
	}

	/**
	 * If a name is empty then it set from first part of an email
	 * @param array $data
	 * @return array
	 */
	public static  function setNameByEmail(array $data): array
	{
		if ($data["name"] === "") {

			preg_match( "/[\w\.-]+/", $data["email"] , $matches);
			$data["name"] = $matches[0];

			/** Returned data with the name changes from empty value */
			return $data;
		}
		/** Returned data without changes */
		return $data;
	}
}
