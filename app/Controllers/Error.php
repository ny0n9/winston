<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Error extends BaseController {
	protected $codes = [
		400 => ['400 Bad Request', 'Server menolak permintaan Anda yang buruk.'],
		401 => ['401 UnAuthorised', 'Server menolak permintaan Anda yang tidak sah.'],
		403 => ['403 Forbidden', 'Server menolak untuk memenuhi permintaan Anda / Hak Akses Anda tidak sesuai.'],
		404 => ['404 Not Found', 'Dokumen / file yang diminta tidak ditemukan di server ini.'],
		405 => ['405 Method Not Allowed', 'Metode yang ditentukan dalam Baris Permintaan tidak diperbolehkan untuk sumber daya yang ditentukan.'],
		408 => ['408 Request Timeout', 'Browser Anda gagal mengirim permintaan dalam waktu yang diizinkan oleh server.'],
		500 => ['500 Internal Server Error', 'Permintaan tidak berhasil karena kondisi tidak terduga yang ditemui oleh server.'],
		502 => ['502 Bad Gateway', 'Server menerima respons yang tidak valid dari server upstream saat mencoba memenuhi permintaan.'],
		504 => ['504 Gateway Timeout', 'Server upstream gagal mengirim permintaan dalam waktu yang diizinkan oleh server.'],
	];

	public function index()	{
		$status = isset($_SERVER['REDIRECT_STATUS']) ? $_SERVER['REDIRECT_STATUS'] : 404;

		if (isset($this->codes[$status][0])) {
			$title = $this->codes[$status][0];
			$message = $this->codes[$status][1];
		} else {
			if ($_SERVER['REDIRECT_STATUS'] == 200) {
				$title = 'HTML akses kode = 200';
				$message = 'Anda mengakses halaman ini secara langsung';
			} else {
				$title = 'Error kode : ' . $status;
				$message = 'Error kode ' . $status . ' tidak valid';
			}
		}
		$data = [
			'title' => $title,
			'message' => $message
		];
		return view('errors/view_error', $data);
	}
	public function show($seg = false) {
		if ($seg) {
			if (strcmp($seg, 's400') == 0) {
				$data = [
					'title' => $this->codes[400][0],
					'message' => $this->codes[400][1]
				];
				return view('errors/view_error', $data);
			} else if (strcmp($seg, 's401') == 0) {
				$data = [
					'title' => $this->codes[401][0],
					'message' => $this->codes[401][1]
				];
			} else if (strcmp($seg, 's403') == 0) {
				$data = [
					'title' => $this->codes[403][0],
					'message' => $this->codes[403][1]
				];
			} else if (strcmp($seg, 's404') == 0) {
				$data = [
					'title' => $this->codes[404][0],
					'message' => $this->codes[404][1]
				];
			} else if (strcmp($seg, 's405') == 0) {
				$data = [
					'title' => $this->codes[405][0],
					'message' => $this->codes[405][1]
				];
			} else if (strcmp($seg, 's408') == 0) {
				$data = [
					'title' => $this->codes[408][0],
					'message' => $this->codes[408][1]
				];
			} else if (strcmp($seg, 's500') == 0) {
				$data = [
					'title' => $this->codes[500][0],
					'message' => $this->codes[500][1]
				];
			} else if (strcmp($seg, 's502') == 0) {
				$data = [
					'title' => $this->codes[502][0],
					'message' => $this->codes[502][1]
				];
			} else if (strcmp($seg, 's504') == 0) {
				$data = [
					'title' => $this->codes[504][0],
					'message' => $this->codes[504][1]
				];
			} else {
				$status = isset($_SERVER['REDIRECT_STATUS']) ? $_SERVER['REDIRECT_STATUS'] : 404;

				if (isset($this->codes[$status][0])) {
					$title = $this->codes[$status][0];
					$message = $this->codes[$status][1];
				} else {
					if ($_SERVER['REDIRECT_STATUS'] == 200) {
						$title = 'HTML akses kode = 200';
						$message = 'Anda mengakses halaman ini secara langsung namun tidak tersedia';
					} else {
						$title = 'Error kode : ' . $status;
						$message = 'Error kode ' . $status . ' tidak valid';
					}
				}
				$data = [
					'title' => $title,
					'message' => $message
				];
			}
			return view('errors/view_error', $data);
		}
	}
}
