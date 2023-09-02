<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
if(!function_exists('getShortBulan')) {
    function getShortBulan($bln) {
        switch ($bln){
            case '01':
            	return "Jan";
                break;
            case '02':
                return "Feb";
                break;
            case '03':
                return "Mar";
                break;
            case '04':
                return "Apr";
                break;
            case '05':
                return "May";
                break;
            case '06':
                return "Jun";
                break;
            case '07':
                return "Jul";
                break;
            case '08':
                return "Aug";
                break;
            case '09':
                return "Sep";
                break;
            case '10':
                return "Oct";
                break;
            case '11':
                return "Nov";
                break;
            case '12':
                return "Des";
                break;
        }
    }
}
if(!function_exists('jMY_DateStr')) {
    function jMY_DateStr($tanggal) {
        $tgl = substr($tanggal, 0, 2);
        $bln = substr($tanggal, 3, 2);
        $thn = substr($tanggal, 6, 4);
        $nmbln = getShortBulan($bln);
        return $tgl."-".$nmbln."-".$thn;
    }
}
if(!function_exists('ddMY_DateStr')) {
    function ddMY_DateStr($tanggal) {
        //yyyy-mm-dd ke dd-mm-yyyy
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);
        return $tgl."-".$bln."-".$thn;
    }
}
if(!function_exists('ddMY_DateTimeStr')) {
    function ddMY_DateTimeStr($tanggal) {
        //yyyy-mm-dd HH:mm:ss ke dd-mm-yyyy HH:mm:ss
		$time = substr($tanggal, 11, 8); 
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);
        return $tgl."-".$bln."-".$thn.' '.$time;
    }
}

if(!function_exists('ddMYG_DateStr')) {
    function ddMYG_DateStr($tanggal) {
        //yyyy-mm-dd ke dd/mm/yyyy
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);
        return $tgl."/".$bln."/".$thn;
    }
}
if(!function_exists('ddMY_DateSql')) {
    // dd-mm-yyyy ke yyyy-mm-dd
    function ddMY_DateSql($tanggal) {
        //$tanggal = yyyy-mm-dd
        $tgl = substr($tanggal, 0, 2);
        $bln = substr($tanggal, 3, 2);
        $thn = substr($tanggal, 6, 4);
        return $thn."-".$bln."-".$tgl;
    }
}
if(!function_exists('ddMYG_DateSql')) {
    //dari dd/mm/yyyy ke yyyy-mm-dd
    function ddMYG_DateSql($tanggal) {
        $tgl = substr($tanggal, 0, 2);
        $bln = substr($tanggal, 3, 2);
        $thn = substr($tanggal, 6, 4);
        return $thn."-".$bln."-".$tgl;
    }
}
if(!function_exists('ddMYHH_DateStr')) {
    function ddMYHH_DateStr($tanggal) {
        //$tanggal = yyyy-mm-dd hh:mm:ss
        $jam = substr($tanggal, 11, 8);
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);
        return $tgl."/".$bln."/".$thn." ".$jam;
    }
}
if(!function_exists('kelaminStr')) {
    function kelaminStr($kelamin) {
        if ($kelamin == 'L') {
        	return 'Laki Laki';
        } elseif ($kelamin == 'P') {
            return 'Perempuan';
        }
    }
}
if (!function_exists('statusStr')) {
    function statusStr($status) {
        switch ($status) {
            case 'sering_aktif':
                $result = 'Sering Aktif';
                break;
            case 'cukup_aktif':
                $result = 'Cukup Aktif';
                break;
            case 'kurang_aktif':
                $result = 'Kurang Aktif';
                break;
            case 'tidak_aktif':
                $result = 'Tidak Aktif';
                break;
            case 'atestasi':
                $result = 'Atestasi';
                break;
            default:
                $result = 'Wafat';
                break;
        }
        return $result;
    }
}

if (!function_exists('UsiaLongStr')) {
    function UsiaLongStr($usiaLong) {
        $result = str_replace('years', 'tahun', $usiaLong);
        $result = str_replace('year', 'tahun', $result);
        $result = str_replace('mons', 'bulan', $result);
        $result = str_replace('mon', 'bulan', $result);
        $result = str_replace('days', 'hari', $result);
        $result = str_replace('day', 'hari', $result);
        return $result;
    }
}

if (!function_exists('optionSelected')) {
    // Cara Pakai : optionSelected($nilai_field, 'nilai_option');
    function optionSelected($cval, $val) {
        $ret = '';
        if ($cval == $val) {
            $ret = 'selected';
        }
        return $ret;
	}
}

if (!function_exists('setPassword')) {
    function setPassword($password) {
        $hashOptions = [
            'cost' => 10
        ];
        return password_hash(
            base64_encode(
                hash('sha384', $password, true)
            ),
            PASSWORD_DEFAULT,
            $hashOptions
        );
    }
}

if (!function_exists('checkPassword')) {
    function checkPassword($password, $pwd_hash) {
        return password_verify(base64_encode(hash('sha384', $password, true)), $pwd_hash);
    }
}
if (!function_exists('uri_title')) {
    function uri_title() {
        $uri = $_SERVER['REQUEST_URI'];
        switch ($uri) {
            case '/login':
                $result = 'Form Login';
                break;
            case '/register':
                $result = 'Form Registrasi';
                break;
            case '/forgot':
                $result = 'Form Lupa Password';
                break;
            default:
                $result = 'Proses Otentikasi';
                break;
        }
        return $result;
    }
}
/* Cara pakai set menu aktif :
Pada file main_menu.php di baris pertama tambahkan :
	<?php $slug = substr($_SERVER['REQUEST_URI'], 1); ?>
kemudian pada link nya tambahkan seperti contoh :
	<a class="dropdown-item <?= setActive($slug, 'request_uri') ?>"
*/
if (!function_exists('setActive')) {
    function setActive($slug, $pageSlug) {
		if (strcmp($slug, $pageSlug) == 0) return 'active';
		else return '';
	}
}
if (!function_exists('randomNumber')) {
	function randomNumber($length) {
		$result = '';
		for($i = 0; $i < $length; $i++) {
			$result .= mt_rand(0, 9);
		}
		return $result;
	}
}

/* Cara pakai is_multidimension
if (is_multidimension($data)) $builder->insertBatch($data);
else $builder->insert($data);
*/
if (!function_exists('is_multidimension')) {
	function is_multidimension($arr) {
        $rv = array_filter($arr, 'is_array');
        if (count($rv)>0) return true;
        return false;
    }
}
