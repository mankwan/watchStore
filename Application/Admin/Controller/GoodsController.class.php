<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
	public function GoodsLists(){
		$goods_list=D('Goods')->getGoodslist();
		$this->assign('goods_list',$goods_list);
		$result=D('Goods')->delete();	
		if($result){
			$this->success('删除成功','Goods/GoodsLists');
		}
		$this->display();
	}
	public function GoodsAdd(){
		if(IS_POST){
			$data=I("post.");
			// $upload= new \Think\Upload();
			// $upload->maxSize=3145728;
			// $upload->exts=array('jpg','png','gif');
			// $upload->savePath='../Public/Img';
			// $upload->saveName=array('hi');
			// $file=$upload->upload();
			// //dump($file);
			if(D("Goods")->addGoods($data)==1){
				$this->success("添加商品成功",'../Goods/GoodsLists');
			}else{
				$this->error("添加商品失败");
			}
		}else{
			$this->display();
		}
	}
	public function edit(){
		$id=I("get.id");
		//dump($id);
		if(IS_POST){
			$data=I("post.");
			$id=I("post.id");			
			if(D("Goods")->edit($id,$data)==1){
				$this->success("修改商品成功",'GoodsLists');
			}else{
				$this->error("修改商品失败");
			}
		}else{//根据id找到那条信息的所有内容，然后打印出来			
			$good_info=D("Goods")->getGoodsById($id);
			//dump($good_info);
			$this->assign("good_info",$good_info);
			$this->display();
			
		}
	}
}