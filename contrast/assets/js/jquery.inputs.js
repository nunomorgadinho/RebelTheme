
(function ($) {

$.fn.hint = function (blurClass) {
    if (!blurClass) blurClass = 'blur';
    
    return this.each(function () {
        var $input = $(this),
            title = $input.attr('title'),
            $form = $(this.form),
            $win = $(window);

        function remove() {
            if (this.value === title && $input.hasClass(blurClass)) {
                $input.val('').removeClass(blurClass);
            }
        }

        if (title) { 
            $input.blur(function () {
                if (this.value === '') {
                    $input.val(title).addClass(blurClass);
                }
            }).focus(remove).blur();
            
            $form.submit(remove);
            $win.unload(remove);
        }
    });
};

})(jQuery);

$(function(){ 
	$('input[title!=""]').hint();
});