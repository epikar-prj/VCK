$(function(){
	
	/* focus action for label on input */
	var toggleLabel = function ($input) {
		$input.each(function () {
			var self = $(this);
			self.on({
				focus : function () {
					$('label[for=' + self.attr('id') +']').hide();
				},
				blur : function () {
					if (self.val() === '') {
						$('label[for=' + self.attr('id') +']').show();
					}
				}
			});
			if (self.val() !== '') {
				self.triggerHandler('focus');
			}
		});
	};

	// toggle label when focus on input
	(function() {
		toggleLabel( $('.js-label-toggle') );
	})();

		
});