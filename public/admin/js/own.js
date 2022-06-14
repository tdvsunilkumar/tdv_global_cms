function loadspinner(){
	$('#page-overlay').css('display','block');
}

function hidespinner() {
	$('#page-overlay').css('display','none');
}

function showalertmessage(msg, url) {
	$('#toast').addClass('show');
	$('.toastDesc').html(msg);
    setTimeout(function(){ 
    	$('#toast').addClass('').removeClass('show');
    	if(url != ''){
    		window.location.href = url;
    	}
    	 }, 3000);
	
}

function ajaxSuccess(dataObj, url) {
	if(dataObj.status == 'validation_error'){
            $.each(dataObj.data, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
        }
        if(dataObj.status == 'success'){
        	showalertmessage(dataObj.msg, url);
        }
        if(dataObj.status == 'error'){
            showalertmessage(dataObj.msg, '');
        }
        
}

function ajaxError() {
	hidespinner();
        showalertmessage('Server Error, Please Try again', '');
}


