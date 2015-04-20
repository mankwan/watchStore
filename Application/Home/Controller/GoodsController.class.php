<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller{
	public function casioList(){		
		$goods_list=D('Goods')->getGoodslist();
		$this->assign('goods_list',$goods_list);
		$this->display();
	}
	public function gShock(){
		$id=I("get.id");
		$good_info=D("Goods")->getGoodsById($id);
		$this->assign('good_info',$good_info);
		$this->display();
	}
	public function addToCart(){
		$good_id=I("goodId");
		$good_num=I("goodNum");
		$good_price=I("goodPrice");
		$good_name=I("goodName");
		$uid= session("userid");
		if(session("username")){
			 D("Cart")->addToCart($uid,$good_id,$good_num,$good_price,$good_name);
			 $this->ajaxReturn(array(
			 	"status"=>200,
			 	"info"=>"successfully add to cart"
			 	));
		}else{	
			$arr=array("good_id"=>$good_id,"good_num"=>$good_num,"good_price"=>$good_price,"good_name"=>$good_name);
			
			$data=unserialize(session("cart"));
			$is_repeat=false;
			foreach ($data as $k=>$v){
				if($v["good_id"]==$good_id){
					$data[$k]["good_num"]==$good_num;
					$data[$k]["good_price"]==$good_price;
					$data[$k]["good_name"]==$good_name;
					$is_repeat=true;
					break;
				}
			}
			if(!is_repeat){
				$data[]=$arr;
			}
			$data=serialize($data);//把商品序列化
			// print_r($data);
			session("cart",$data);//放进session中
			 // echo session("cart");
			$this->ajaxReturn(array(
					"status"=>100,
					"info"=>"sess"
					));
		}
		$this->display();
	}
	public  function myCart(){
		$uid= session("userid");
		$cart_list=D("Cart")->getCartlist($uid);
		$this->assign('cart_list',$cart_list);
		$this->display();
	}
	public function checkCart(){
		$uid= session("userid");
		$cart_list=D("Cart")->getCartlist($uid);
		$this->assign('cart_list',$cart_list);
		$this->display();
	}
}