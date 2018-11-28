<?php
include ('model/m_tintuc.php');
include ('model/pager.php');
/**
* 
*/
	class C_tintuc
		{
			public function index()
			{
				$m_tintuc = new M_tintuc();
				$slide = $m_tintuc->getSlide();
				$menu = $m_tintuc->getMenu();

				return array('slide'=>$slide,'menu'=>$menu);
			}

			function loaitin()
			{
				$id_loai = $_GET['id_loai'];
				$m_tintuc = new M_tintuc();

				$alias = $m_tintuc->getAliasLoaiTin($id_loai);
				$danhmuctin = $m_tintuc->getTinTucByIDLoai($id_loai);
				$tranghientai = (isset($_GET['page']))?$_GET['page']:1;

				$pagination = new pagination(count($danhmuctin),$tranghientai,5,5);
				$paginationHTML = $pagination->showPagination();
				$limit = $pagination->_nItemOnPage;
				$vitri = ($tranghientai-1)*$limit;
				$danhmuctin = $m_tintuc->getTinTucByIDLoai($id_loai,$vitri,$limit);
 
				$menu = $m_tintuc->getMenu();
				$title = $m_tintuc->getTitleById($id_loai);
				return array('danhmuctin'=>$danhmuctin,'menu'=>$menu,'title'=>$title,'thanh_phantrang'=>$paginationHTML,'alias'=>$alias);
			}

			function chitietTin(){
				$id_tin = $_GET['id_tin'];
				$alias = $_GET['loai_tin'];
				$m_tintuc = new M_tintuc();
				$chitiet_tin = $m_tintuc->getchitietTin($id_tin);
				$comment = $m_tintuc->getComment($id_tin);
				$relatednews = $m_tintuc->getRelatedNews($alias);
				$tinnoibat = $m_tintuc->getTinNoiBat();
				return array('chitietTin'=>$chitiet_tin,'comment'=>$comment,'tinnoibat'=>$tinnoibat,'relatednews'=>$relatednews);
			}

			function themBinhLuan($id_user,$id_tin,$noidung){
				$m_tintuc = new M_tintuc();
				$binhluan = $m_tintuc->addComment($id_user,$id_tin,$noidung);
				header('location:'.$_SERVER['HTTP_REFERER']);
			}

			function timkiem($key){
				$m_tintuc = new M_tintuc();
				$tin = $m_tintuc->search($key);
				return $tin;
			}

		}
?>