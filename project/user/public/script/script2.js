
function plussp1(){
		//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp1").val(),10)+1;
		$("input.input-text.qty.text.slsp1").val(New);
}
function minussp1(){
		//var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp1").val(),10)-1;
		if (New>0)
			$("input.input-text.qty.text.slsp1").val(New);	
}

function plussp2(){
		//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp2").val(),10)+1;
		$("input.input-text.qty.text.slsp2").val(New);
}
function minussp2(){
	//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp2").val(),10)-1;
		if (New>0)
			$("input.input-text.qty.text.slsp2").val(New);	
}

function plussp3(){
		//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp3").val(),10)+1;
		if (New>0)
			$("input.input-text.qty.text.slsp3").val(New);
}
function minussp3(){
		//var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp3").val(),10)-1;
		if (New>0)
			$("input.input-text.qty.text.slsp3").val(New);	
}

function plussp4(){
		//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp4").val(),10)+1;
		$("input.input-text.qty.text.slsp4").val(New);
}
function minussp4(){
	//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp4").val(),10)-1;
		if (New>0)
			$("input.input-text.qty.text.slsp4").val(New);	
}

function plussp5(){
		//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp5").val(),10)+1;
		$("input.input-text.qty.text.slsp5").val(New);
}
function minussp5(){
		//var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp5").val(),10)-1;
		if (New>0)
			$("input.input-text.qty.text.slsp5").val(New);	
}

function plussp6(){
		//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp6").val(),10)+1;
		$("input.input-text.qty.text.slsp6").val(New);
}
function minussp6(){
	//	var Old=$("input.input-text.qty.text").val();
		var New=parseInt($("input.input-text.qty.text.slsp6").val(),10)-1;
		if (New>0)
			$("input.input-text.qty.text.slsp6").val(New);	
}


function removesp1(){
		alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
                function(e){
                if(e==true){
	                	sessionStorage.removeItem('cost1');
						sessionStorage.removeItem('name1');
						sessionStorage.removeItem('soluong1');
						sessionStorage.removeItem('tong1');
						var i=0;subtotalcart=0;
						if(sessionStorage.getItem('name1') != null){i+=1;subtotalcart+=50000;flag1++;}
						else sessionStorage.tong1=0;
						if(sessionStorage.getItem('name2') != null){i+=1;subtotalcart+=300000;flag2++;}
						else sessionStorage.tong2=0;
						if(sessionStorage.getItem('name3') != null){i+=1;subtotalcart+=50000;flag3++;}
						else sessionStorage.tong3=0
						if(sessionStorage.getItem('name4') != null){i+=1;subtotalcart+=60000;flag4++;}
						else sessionStorage.tong4=0;
						if(sessionStorage.getItem('name5') != null){i+=1;subtotalcart+=50000;flag5++;}
						else sessionStorage.tong5=0;
						if(sessionStorage.getItem('name6') != null){i+=1;subtotalcart+=70000;flag6++;}
						else sessionStorage.tong6=0;
						sessionStorage.setItem('countcart',i);
						sessionStorage.setItem('subtotalcart',subtotalcart);
						$("span.product-count").html(sessionStorage.getItem('countcart'));
						$("span.cart-amunt").html(((sessionStorage.getItem('subtotalcart'))/1000).toFixed(3)+" VND");
						sessionStorage.setItem('flag',0);
                		alertify.success('Bạn đã xóa thành công !');
                    	setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                } else {
                    alertify.error('Xóa chưa thành công !');
                    setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                }
          });
}
function removesp2(){
		alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
                function(e){
                if(e==true){
	                	sessionStorage.removeItem('cost2');
						sessionStorage.removeItem('name2');
						sessionStorage.removeItem('soluong2');
						sessionStorage.removeItem('tong2');
						var i=0;subtotalcart=0;
						if(sessionStorage.getItem('name1') != null){i+=1;subtotalcart+=50000;flag1++;}
						else sessionStorage.tong1=0;
						if(sessionStorage.getItem('name2') != null){i+=1;subtotalcart+=300000;flag2++;}
						else sessionStorage.tong2=0;
						if(sessionStorage.getItem('name3') != null){i+=1;subtotalcart+=50000;flag3++;}
						else sessionStorage.tong3=0
						if(sessionStorage.getItem('name4') != null){i+=1;subtotalcart+=60000;flag4++;}
						else sessionStorage.tong4=0;
						if(sessionStorage.getItem('name5') != null){i+=1;subtotalcart+=50000;flag5++;}
						else sessionStorage.tong5=0;
						if(sessionStorage.getItem('name6') != null){i+=1;subtotalcart+=70000;flag6++;}
						else sessionStorage.tong6=0;
						sessionStorage.setItem('countcart',i);
						sessionStorage.setItem('subtotalcart',subtotalcart);
						$("span.product-count").html(sessionStorage.getItem('countcart'));
						$("span.cart-amunt").html(((sessionStorage.getItem('subtotalcart'))/1000).toFixed(3)+" VND");
						sessionStorage.setItem('flag',0);
                		alertify.success('Bạn đã xóa thành công !');
                    	setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                } else {
                    alertify.error('Xóa chưa thành công !');
                    setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                }
          });
}
function removesp3(){
		alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
                function(e){
                if(e==true){
	                	sessionStorage.removeItem('cost3');
						sessionStorage.removeItem('name3');
						sessionStorage.removeItem('soluong3');
						sessionStorage.removeItem('tong3');
						var i=0;subtotalcart=0;
						if(sessionStorage.getItem('name1') != null){i+=1;subtotalcart+=50000;flag1++;}
						else sessionStorage.tong1=0;
						if(sessionStorage.getItem('name2') != null){i+=1;subtotalcart+=300000;flag2++;}
						else sessionStorage.tong2=0;
						if(sessionStorage.getItem('name3') != null){i+=1;subtotalcart+=50000;flag3++;}
						else sessionStorage.tong3=0
						if(sessionStorage.getItem('name4') != null){i+=1;subtotalcart+=60000;flag4++;}
						else sessionStorage.tong4=0;
						if(sessionStorage.getItem('name5') != null){i+=1;subtotalcart+=50000;flag5++;}
						else sessionStorage.tong5=0;
						if(sessionStorage.getItem('name6') != null){i+=1;subtotalcart+=70000;flag6++;}
						else sessionStorage.tong6=0;
						sessionStorage.setItem('countcart',i);
						sessionStorage.setItem('subtotalcart',subtotalcart);
						$("span.product-count").html(sessionStorage.getItem('countcart'));
						$("span.cart-amunt").html(((sessionStorage.getItem('subtotalcart'))/1000).toFixed(3)+" VND");
						sessionStorage.setItem('flag',0);
                		alertify.success('Bạn đã xóa thành công !');
                    	setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                } else {
                    alertify.error('Xóa chưa thành công !');
                    setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                }
          });
}
function removesp4(){
		alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
                function(e){
                if(e){
	                	sessionStorage.removeItem('cost4');
						sessionStorage.removeItem('name4');
						sessionStorage.removeItem('soluong4');
						sessionStorage.removeItem('tong4');
						var i=0;subtotalcart=0;
						if(sessionStorage.getItem('name1') != null){i+=1;subtotalcart+=50000;flag1++;}
						else sessionStorage.tong1=0;
						if(sessionStorage.getItem('name2') != null){i+=1;subtotalcart+=300000;flag2++;}
						else sessionStorage.tong2=0;
						if(sessionStorage.getItem('name3') != null){i+=1;subtotalcart+=50000;flag3++;}
						else sessionStorage.tong3=0
						if(sessionStorage.getItem('name4') != null){i+=1;subtotalcart+=60000;flag4++;}
						else sessionStorage.tong4=0;
						if(sessionStorage.getItem('name5') != null){i+=1;subtotalcart+=50000;flag5++;}
						else sessionStorage.tong5=0;
						if(sessionStorage.getItem('name6') != null){i+=1;subtotalcart+=70000;flag6++;}
						else sessionStorage.tong6=0;
						sessionStorage.setItem('countcart',i);
						sessionStorage.setItem('subtotalcart',subtotalcart);
						$("span.product-count").html(sessionStorage.getItem('countcart'));
						$("span.cart-amunt").html(((sessionStorage.getItem('subtotalcart'))/1000).toFixed(3)+" VND");
						sessionStorage.setItem('flag',0);
                		alertify.success('Bạn đã xóa thành công !');
                    	setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                } else {
                    alertify.error('Xóa chưa thành công !');
                    setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                }
          });
}
function removesp5(){
		alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
                function(e){
                if(e){
	                	sessionStorage.removeItem('cost5');
						sessionStorage.removeItem('name5');
						sessionStorage.removeItem('soluong5');
						sessionStorage.removeItem('tong5');
						var i=0;subtotalcart=0;
						if(sessionStorage.getItem('name1') != null){i+=1;subtotalcart+=50000;flag1++;}
						else sessionStorage.tong1=0;
						if(sessionStorage.getItem('name2') != null){i+=1;subtotalcart+=300000;flag2++;}
						else sessionStorage.tong2=0;
						if(sessionStorage.getItem('name3') != null){i+=1;subtotalcart+=50000;flag3++;}
						else sessionStorage.tong3=0
						if(sessionStorage.getItem('name4') != null){i+=1;subtotalcart+=60000;flag4++;}
						else sessionStorage.tong4=0;
						if(sessionStorage.getItem('name5') != null){i+=1;subtotalcart+=50000;flag5++;}
						else sessionStorage.tong5=0;
						if(sessionStorage.getItem('name6') != null){i+=1;subtotalcart+=70000;flag6++;}
						else sessionStorage.tong6=0;
						sessionStorage.setItem('countcart',i);
						sessionStorage.setItem('subtotalcart',subtotalcart);
						$("span.product-count").html(sessionStorage.getItem('countcart'));
						$("span.cart-amunt").html(((sessionStorage.getItem('subtotalcart'))/1000).toFixed(3)+" VND");
						sessionStorage.setItem('flag',0);
                		alertify.success('Bạn đã xóa thành công !');
                    	setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                } else {
                    alertify.error('Xóa chưa thành công !');
                    setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                }
          });
}
function removesp6(){
		alertify.confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?",
                function(e){
                if(e){
	                	sessionStorage.removeItem('cost6');
						sessionStorage.removeItem('name6');
						sessionStorage.removeItem('soluong6');
						sessionStorage.removeItem('tong6');
						var i=0;subtotalcart=0;
						if(sessionStorage.getItem('name1') != null){i+=1;subtotalcart+=50000;flag1++;}
						else sessionStorage.tong1=0;
						if(sessionStorage.getItem('name2') != null){i+=1;subtotalcart+=300000;flag2++;}
						else sessionStorage.tong2=0;
						if(sessionStorage.getItem('name3') != null){i+=1;subtotalcart+=50000;flag3++;}
						else sessionStorage.tong3=0
						if(sessionStorage.getItem('name4') != null){i+=1;subtotalcart+=60000;flag4++;}
						else sessionStorage.tong4=0;
						if(sessionStorage.getItem('name5') != null){i+=1;subtotalcart+=50000;flag5++;}
						else sessionStorage.tong5=0;
						if(sessionStorage.getItem('name6') != null){i+=1;subtotalcart+=70000;flag6++;}
						else sessionStorage.tong6=0;
						sessionStorage.setItem('countcart',i);
						sessionStorage.setItem('subtotalcart',subtotalcart);
						$("span.product-count").html(sessionStorage.getItem('countcart'));
						$("span.cart-amunt").html(((sessionStorage.getItem('subtotalcart'))/1000).toFixed(3)+" VND");
						sessionStorage.setItem('flag',0);
                		alertify.success('Bạn đã xóa thành công !');
                    	setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                } else {
                    alertify.error('Xóa chưa thành công !');
                    setTimeout(function(){
				    	location.reload(3000);
					}, 1000);
                }
          });
}
$('input#thanhtoansp').click(function() {
	if ((sessionStorage.tk=="hcmue") && (sessionStorage.mk=="hcmue")){
		window.location = 'checkout.html';
	}
	else{
		alertify.alert("Bạn chưa đăng nhập ! <br> Vui lòng chờ trong giây lát..");
		setTimeout(function(){
			window.location = 'login.html';		    	
		}, 2000);	
	}
})
$('input#place_order').click(function() {
	if ((sessionStorage.tk=="hcmue") && (sessionStorage.mk=="hcmue")){
		alertify.alert('Ban đã đặt hàng thành công !');
	}
	else{
		alertify.alert("Bạn chưa đăng nhập ! <br> Vui lòng chờ trong giây lát..");
		setTimeout(function(){
			window.location = 'login.html';		    	
		}, 3000);	
	}
});
