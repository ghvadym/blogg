(function($){
    $(document).ready(function() {
        // $(document).on("click", "#navbarDropdown", () => {
        //     $(this).toggleClass('show');
        //     $('.nav-item.dropdown .dropdown-menu').toggleClass('show');
        // });
        $(".post-img").lazyload({effect : "fadeIn"});
    });
})(jQuery);