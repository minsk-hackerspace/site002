(function($){
	
	/** Options Tabs */
	function vortexOptionsTabs() {
		
		var relid = $.cookie( 'vortex_tab_relid' );
		
		if( relid >= 1  ) {
			vortexOptionsTabControl( relid );
		} else {
			vortexOptionsTabControl( 0 );
		}
		
		$( '.vortex-group-tab-link-a' ).click( function() {
			
			relid = $(this).attr( 'data-rel' );
			$.cookie( 'vortex_tab_relid', relid );
			vortexOptionsTabControl( relid );		
			
		});
		
	}
	
	function vortexOptionsTabControl( relid ) {
		
		$( '.vortex-group-tab' ).each( function() {
				
			if( $(this).attr( 'id' ) == relid + '_section_group' ) {					
				$(this).delay( 400 ).fadeIn( 1200 );				
			} else{					
				$(this).fadeOut( 'fast' );
			}
			
		});
		
		$( '.vortex-group-tab-link-li' ).each( function() {
			
			if( $(this).attr('id') != relid + '_section_group_li' && $(this).hasClass( 'active' ) ) {					
				$(this).removeClass( 'active' );				
			}
			
			if( $(this).attr('id') == relid + '_section_group_li' ) {					 
				 $(this).addClass('active');				
			}
		
		});
		
	}
	
	/** jQuery Document Ready */
	$(document).ready(function(){		
		vortexOptionsTabs();		
	});

	/** jQuery Windows Load */
	$(window).load(function(){
	});	

})(jQuery);