$(".btn-info").click(function() {
	var $btn = $(this);
	$btn.button('loading');
    // simulating a timeout
    setTimeout(function () {
    	$btn.button('reset');
    }, 2000);
});
$(".btn-success").click(function() {
	var $btn = $(this);
	$btn.button('loading');
    // simulating a timeout
    setTimeout(function () {
    	$btn.button('reset');
    }, 2000);
});


$(".btn-danger").click(function() {
if (confirm("Bạn có Chắc chắn muốn xóa")) {
		return true;
	}else{
		return false;
	}
});
