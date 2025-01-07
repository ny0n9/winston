<?php

namespace App\Libraries;

use CodeIgniter\Debug\BaseExceptionHandler;
use CodeIgniter\Debug\ExceptionHandlerInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class MyExceptionHandler extends BaseExceptionHandler implements ExceptionHandlerInterface {
	// You can override the view path.
	protected ?string $viewPath = ROOTPATH . 'public/';

	public function handle(
		Throwable $exception,
		RequestInterface $request,
		ResponseInterface $response,
		int $statusCode,
		int $exitCode
	): void {
		$this->render($exception, $statusCode, $this->viewPath . "error_msg.php");

		exit($exitCode);
	}
}
/*
/*
Edit file app/Config/Exceptions.php
sisipkan pada fungsi handler :
if (in_array($statusCode, [400, 401, 403, 405, 406, 408, 500, 501, 502, 503, 504, 506, 506, 507], true)) {
	return new \App\Libraries\MyExceptionHandler($this);
}
nama file harus menggunakan garis bawah : error_msg
gunakan $statusCode sebagai error code dan $exception->getMessage() sebagai error msg
*/
