<?php
//Chuyển tiếng việt có dấu sang không dấu
			function stripUnicode($str){
				if(!$str) return false;
				$unicode = array(
				'a' => 'à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ',
				'A' => 'À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ',
				'd' => 'd',
				'D' => 'Đ',
				'e' => 'è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ',
				'E' => 'È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ',
				'i' => 'ì|í|ị|ỉ|ĩ',
				'I' => 'Ì|Í|Ị|Ỉ|Ĩ',
				'o' => 'ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ',
				'O' => 'Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ',
				'u' => 'ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ',
				'U' => 'Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ',
				'y' => 'ỳ|ý|ỵ|ỷ|ỹ',
				'Y' => 'Ỳ|Ý|Ỵ|Ỷ|Ỹ'
				);
				foreach($unicode as $khongdau => $codau){
					$arr = explode("|",$codau);
					$str = str_replace($arr,$khongdau,$str);
				}
				return $str;
			}
			// Chuyển khoảng trống thành dấu -
			function changeTitle($str){
				$str = trim($str);
				if($str == "") return "";
				$str = str_replace('"','',$str);
				$str = str_replace("'",'',$str);
				$str = stripUnicode($str);
				$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
				
				$str = str_replace(' ','-',$str);
				return $str;
			}
?>