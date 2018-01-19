onResize = function() {

	var viewportWidth = $("body").innerWidth();
	if( viewportWidth <= '767' ){
		
	}else{
		
	}
	

}

$(document).ready(onResize);
$(window).resize(onResize);

$(document).ready(function() {
	
	//Sticky Sidebar
	$("article .page-content .col-right").stick_in_parent();
	$("article .dashboard-content .col-left").stick_in_parent();
	
	//Disable Click
	$( document ).on( "click", ".no-link", function(e) {
		e.preventDefault();
	});
	
	// attach the plugin to all selects
	$('.custom-select').selectik({maxItems: 8, minScrollHeight: 20}, {
			_generateHtml: function(){
				this.$collection = this.$cselect.children();
				var html = '';
				for (var i = 0; i < this.$collection.length; i++){
					var $this = $(this.$collection[i]);
					html += '<li class="'+ ($this.attr('disabled') === 'disabled' ? 'disabled' : '') +'" data-value="'+$this[0].value+'">'+($this.data('selectik') ? $this.data('selectik') : $this[0].text)+'</li>';
				 };
				return html;
			}
		}
	);
	
	$('article .content .container .cols').matchHeight();
	$("article .content .category-list li").each( function (index) {
		index += 1;
		if(index % 2 == 0) {
			$(this).addClass("second-child");
		}
	});
	
	$(document).tooltip({ selector: "[title]", placement: "right", trigger: "focus", animation: true});
	
	/*
	$('#rootwizard').bootstrapWizard({
		onTabClick: function(tab, navigation, index) {
			return false;
		}
	});
	*/
	
	$('#rootwizard').bootstrapWizard({
		
		onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.bar').css({width:$percent+'%'});
			
			// If it's the last tab then hide the last button and show the finish instead
			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else {
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		
		},
		onTabClick: function(tab, navigation, index) {
			return false;
		}
		
	});
	
	$('#rootwizard .finish').click(function() {
		alert('Finished!, Starting over!');
		$('#rootwizard').find("a[href*='tab1']").trigger('click');
	});
	
	/*
	$('#rootwizard').bootstrapWizard({
		'tabClass': 'nav nav-tabs',
		onTabClick: function(tab, navigation, index) {
			return false;
		}
	});
	*/
	
	jQuery("#breadCrumb0").jBreadCrumb();
	jQuery("#breadCrumb1").jBreadCrumb();
	jQuery("#breadCrumb2").jBreadCrumb();
	jQuery("#breadCrumb3").jBreadCrumb();
	
	
	
});