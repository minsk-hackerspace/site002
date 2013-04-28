/** JS Logics */
(function($){
	
	/** Drop Downs */
	function vortexMenu() {
		
		/** Superfish Menu */
		$( '.menu ul' ).supersubs({			
			minWidth: 12,
			maxWidth: 25,
			extraWidth: 0			
		}).superfish({		
			delay: 1200, 
			autoArrows: false,
			dropShadows: false		
		});
		
		//$( '.menu' ).width( 590 );
	
	}
	
	/** Drop Downs Animate */
	function vortexMenuAnimate() {
		
		var width = 0;
		$( 'ul.sf-menu' ).children().each( function() {
			width += $(this).outerWidth();
		});
		
		
		/** Last Child */
		$( 'ul.sf-menu li:last-child' ).css( 'border-right', 'none' );
		
		/** Make Sure Menu Is Assigned */
		if( width > 10 && width < 930 ) {
			$( '.menu' ).width( width );
			/** Animate Menu */
			$( '.menu' ).animate({
				left: ( 940 - width ) / 2
			}, 1500 );
		}	
		
	}
	
	/** jQuery Document Ready */
	$(document).ready(function(){
		vortexMenu();
	});
	
	/** jQuery Windows Load */
	$(window).load(function(){
		//vortexMenuAnimate();
	});

})(jQuery);