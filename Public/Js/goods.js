$(function(){
	/*加入购物车的单的数量+-*/
	$('#numUp').on('click',function(){
		var goodNum=parseInt($('#goodNum').val());
		$('#goodNum').val(++goodNum);
	});
	$('#numDown').on('click',function(){
		var goodNum=parseInt($('#goodNum').val());
		if(goodNum<2){
			return;
		}
		$('#goodNum').val(--goodNum);
	});



	$('.numUp').on('click',numUp);//cart
	$('.numDown').on('click',numDown);//cart
	$('#addToCart').on('click',addToCart);

	function numUp(){//数目增加
		var goodNum=parseInt($('#goodNum'+$(this).attr("name")).val());
		$('#goodNum'+$(this).attr("name")).val(++goodNum);

	}
	function numDown(){//数目减少
		var goodNum=parseInt($('#goodNum'+$(this).attr("name")).val());
		if(goodNum<2){
			return  ;
		}
		$('#goodNum'+$(this).attr("name")).val(--goodNum);
	}
	function addToCart(){
		var goodId=$('#goodId').val();
		var goodNum=$('#goodNum').val();
		var goodPrice=$('#goodPrice').val();
		var goodName=$('#goodName').val();
		$.post("../../addToCart",{goodId:goodId,goodNum:goodNum,goodPrice:goodPrice,goodName:goodName},function(data){
			if(data.status=="200"){
				alert(data.info);
				location.href="../../myCart";
			}else{
				alert("failed add to cart");
			}
		});
	}
	$('#checkall').on('click',[name='checkall'],function(){//复选框的全选和反选
		if(this.checked){
			$(".checkone").each(function(){
				this.checked=true;
				goodPrice=$('#goodPrice'+$(this).attr("name")).val();
				goodNum=$('#goodNum'+$(this).attr("name")).val();
				var k=$("#total_price").text();
				var result=(goodPrice*goodNum+k*1).toFixed(2);
				$("#total_price").html(result);
			});
			$("#confirm").find('a').attr('class','btn-success btn');
		}else{
			$(".checkone").each(function(){
				this.checked=false;
				$("#total_price").html("0.00");
			});
			$("#confirm").find('a').attr('class','disabled btn-success btn');
		}
	});

	$(".checkone").on('click',check_box_in_total_click);//每个checkbox的价格相加	
	function check_box_in_total_click(){		
		var goodNum=$('#goodNum'+$(this).attr("name")).val();
		var goodPrice=$('#goodPrice'+$(this).attr("name")).val();
		var k=$("#total_price").text();
		if(this.checked){
			this.checked=true;
			$(this).attr("checked");
			var result=(goodNum*goodPrice+k*1).toFixed(2);
			$("#total_price").html(result);
			$("#confirm").find('a').attr('class','btn-success btn');
		}else{
			this.checked=false;
			var result=(k*1-goodNum*goodPrice).toFixed(2);
			$("#total_price").html(result);
			$("#confirm").find('a').attr('class','disabled btn-success btn');
		}
	}

	/*左边栏目的显示和隐藏*/
	$("#leftList [name='casio']").hover(function(){
		$(this).find(".leftNav").slideDown('normal');
	},function(){
		$(this).find(".leftNav").stop().slideUp('normal');
	});

	$("#leftList [name='swatch']").hover(function(){
		$(this).find(".leftNav").slideDown('normal');
	},function(){
		$(this).find(".leftNav").stop().slideUp('normal');
	});

	/*省市联动*/
	$('#city').citySelect({
		url:'../../../Public/Js/city.min.js',
		prov:"",
		city:"",
		dist:"",
		nodata:"none"
	});
	$('#city2').citySelect({
		url:'../../../../../Public/Js/city.min.js',
		prov:"",
		city:"",
		dist:"",
		nodata:"none"
	});
	
});

