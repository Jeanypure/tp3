jQuery(document).ready(function() {
    jQuery('.page-sidebar').on('click','li > a',function(e) {
        //$('.page-sidebar li > a').click(function(){})
        if ($(this).next().hasClass('sub-menu') == false) {
            if ($('.btn-navbar').hasClass('collapsed') == false) {
                $('.btn-navbar').click();
            }
            return;
        }

        if ($(this).next().hasClass('sub-menu.always-open')) {
            return;
        }

        var parent = $(this).parent().parent();
        var the = $(this);

        parent.children('li.open').children('a').children(
            '.arrow').removeClass('open');
        parent.children('li.open').children('.sub-menu')
            .slideUp(200);
        parent.children('li.open').removeClass('open');

        var sub = jQuery(this).next();
        var slideOffeset = -200;
        var slideSpeed = 200;

        if (sub.is(":visible")) {
            jQuery('.arrow', jQuery(this)).removeClass(
                "open");
            jQuery(this).parent().removeClass("open");
            sub
                .slideUp(
                    slideSpeed,
                    function() {
                        if ($('body')
                                .hasClass(
                                    'page-sidebar-fixed') == false
                            && $('body')
                                .hasClass(
                                    'page-sidebar-closed') == false) {
                            App.scrollTo(the,
                                slideOffeset);
                        }
                        handleSidebarAndContentHeight();
                    });
        } else {
            jQuery('.arrow', jQuery(this)).addClass("open");
            jQuery(this).parent().addClass("open");
            sub
                .slideDown(
                    slideSpeed,
                    function() {
                        if ($('body')
                                .hasClass(
                                    'page-sidebar-fixed') == false
                            && $('body')
                                .hasClass(
                                    'page-sidebar-closed') == false) {
                            App.scrollTo(the,
                                slideOffeset);
                        }
                        handleSidebarAndContentHeight();
                    });
        }

        e.preventDefault();
    });

    // handle ajax links
    jQuery('.page-sidebar').on('click',' li > a.ajaxify',function(e) {
        e.preventDefault();
        App.scrollTop();

        var url = $(this).attr("href");
        var menuContainer = jQuery('.page-sidebar ul');
        var pageContent = $('.page-content');
        var pageContentBody = $('.page-content .page-content-body');

        menuContainer.children('li.active').removeClass('active');
        menuContainer.children('arrow.open').removeClass('open');

        $(this).parents('li').each(
            function() {
                $(this).addClass('active');
                $(this).children('a > span.arrow')
                    .addClass('open');
            });
        $(this).parents('li').addClass('active');

        App.blockUI(pageContent, false);

        $.ajax({
            type : "GET",
            cache : false,
            url : url,
            dataType : "html",
            success : function(res) {
                App.unblockUI(pageContent);
                pageContentBody.html(res);
                App.fixContentHeight(); // fix
                // content
                // height
                App.initAjax(); // initialize core
                // stuff
            },
            error : function(xhr, ajaxOptions,
                             thrownError) {
                pageContentBody
                    .html('<h4>Could not load the requested content.</h4>');
                App.unblockUI(pageContent);
            },
            async : false
        });
    });

    var handleSidebarAndContentHeight = function() {
        var content = $('.page-content');
        var sidebar = $('.page-sidebar');
        var body = $('body');
        var height;

        if (body.hasClass("page-footer-fixed") === true
            && body.hasClass("page-sidebar-fixed") === false) {
            var available_height = $(window).height()
                - $('.footer').outerHeight();
            if (content.height() < available_height) {
                content.attr('style', 'min-height:' + available_height
                    + 'px !important');
            }
        } else {
            if (body.hasClass('page-sidebar-fixed')) {
                height = _calculateFixedSidebarViewportHeight();
            } else {
                height = sidebar.height() + 20;
            }
            if (height >= content.height()) {
                content.attr('style', 'min-height:' + height + 'px !important');
            }
        }
    }


    // Helper function to calculate sidebar height for fixed sidebar layout.
    var _calculateFixedSidebarViewportHeight = function() {
        var sidebarHeight = $(window).height() - $('.header').height() + 1;
        if ($('body').hasClass("page-footer-fixed")) {
            sidebarHeight = sidebarHeight - $('.footer').outerHeight();
        }

        return sidebarHeight;
    }

});

