jQuery(document).ready(function($) {
    $(".wp-colorbox-image").colorbox({maxWidth:"99%", maxHeight: "99%"});
    $(".wp-colorbox-youtube").colorbox({iframe:true, width:"90%", height:"90%", maxWidth:640, maxHeight: 480});
    $(".wp-colorbox-vimeo").colorbox({iframe:true, width:"90%", height:"90%", maxWidth:640, maxHeight: 480});
    $(".wp-colorbox-iframe").colorbox({iframe:true, width:"80%", height:"80%"});
    $(".wp-colorbox-inline").colorbox({inline:true, width:"40%", maxWidth:640});
	$(".callbacks").colorbox({
		inline:true, 
		width:"40%",
		onLoad:function(){ var email = $(this).attr('email'); $('#inline_content #authormail').val(email);
		}
	});
});


