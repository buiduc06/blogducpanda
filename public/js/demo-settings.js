

jQuery(document).ready(function () {
    jQuery("body").append("<div class='demo-settings'></div>");
    jQuery(".demo-settings").append("<a href='#show-settings' class='demo-button'><i class='fa fa-gear'></i>Settings</a>");
    jQuery(".demo-settings").append("<div class='demo-options'>" +
            "<div class='title'>Demo settings</div>" +
            "<a href='#demo' rel='font-options' class='option'><i class='fa fa-font'></i><span>Font settings</span><font>Menu and heading font</font></a>" +
            "<div class='option-box' rel='font-options'>" +
            "<div alt='font-options'>" +
            "<a href='#' class='font-bulb active' style='font-family:\"Titillium Web\", sans-serif;'>Ab</a>" +
            "<a href='#' class='font-bulb' style='font-family:\"Roboto Slab\", sans-serif;'>Ab</a>" +
            "<a href='#' class='font-bulb' style='font-family:\"Alegreya Sans SC\", sans-serif;'>Ab</a>" +
            "<a href='#' class='font-bulb' style='font-family:\"Ruda\", sans-serif;'>Ab</a>" +
            "<a href='#' class='font-bulb' style='font-family:\"Marvel\", sans-serif;'>Ab</a>" +
            "</div>" +
            "</div>" +
            "<a href='#demo' rel='color-options' class='option'><i class='fa fa-paint-brush'></i><span>Color options</span><font>Color schemes</font></a>" +
            "<div class='option-box' rel='color-options'>" +
            "<div alt='color-options'>" +
            "<a href='#' class='color-bulb active' style='background: #f85050;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background: #19B5FE;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background: #2ECC71;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background: #F39C12;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background: #6C7A89;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background: #F7CA18;'>&nbsp;</a>" +
            "</div>" +
            "</div>" +
            
            "<a href='#demo' rel='background' class='option'><i class='fa fa-desktop'></i><span>Background</span><font>Backgorund variations</font></a>" +
            "<div class='option-box' rel='background'>" +
            "<div alt='background'>" +
            "<a href='#' class='color-bulb active' style='background-image: url(demo/body/5.png); background-attachment: fixed;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background-image: url(demo/body/2.png); background-attachment: fixed;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background-image: url(demo/body/3.png); background-attachment: fixed;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background-image: url(demo/body/4.png); background-attachment: fixed;'>&nbsp;</a>" +
            "<a href='#' class='color-bulb' style='background-color:#f9f9f9'>&nbsp;</a>" +
            "</div>" +
            "</div>" +
            "<a href='#demo' rel='page-width' class='option'><i class='fa fa-columns'></i><span>Change layout</span><font>Wide or boxed</font></a>" +
            "<div class='option-box' rel='page-width'>" +
            "<div alt='option-box' style='overflow:hidden'>" +
            "<a href='#' class='option-bulb active' rel='wide'>Wide</a>" +
            "<a href='#' class='option-bulb' rel='boxed'>Boxed</a>" +
            "</div>" +
            "</div>" +
            "</div>");

    jQuery(".demo-settings a[href=#demo]").click(function () {
        var thiselem = jQuery(this);
        if (thiselem.parent().find("div[rel=" + thiselem.attr("rel") + "]").hasClass("thisis") == false) {
            thiselem.parent().find("div.thisis").removeClass("thisis").animate({
                height: 'toggle',
                paddingTop: 'toggle',
                opacity: 'toggle'
            }, 150);
        }
        thiselem.parent().find("div[rel=" + thiselem.attr("rel") + "]").toggleClass("thisis").animate({
            height: 'toggle',
            paddingTop: 'toggle',
            opacity: 'toggle'
        }, 150);
        return false;
    });

    jQuery(".option-box div .color-bulb").click(function () {
        var thiselem = jQuery(this);
        var newcolor = thiselem.css("background-color");
        thiselem.siblings().removeClass("active");
        thiselem.addClass("active");

        if (thiselem.parent().attr("alt") == "color-options") {
            jQuery("a:hover,#header .header_meta .weather_forecast i,#header .header_meta .weather_forecast .temp,#site_title span,.dropcap:first-letter,.full_meta span.meta_date:before,.full_meta span.meta_comments:before,.full_meta span.meta_category:before,blockquote p span:first-child,blockquote p span:last-child, .entry_media span.meta_likes a").css("color", newcolor).css("color" + newcolor);
            jQuery("mark,.search_icon_form a,span.format,.tb_widget_tagcloud a:hover,#footer .tb_widget_tagcloud a:hover,.item .item_thumb .thumb_icon a,input[type='submit'], .thumb_meta span.category,ul.products li.product .item_thumb .thumb_icon a,ul.page-numbers li span.current,ul.products li.product a.btn:hover,.layout_post_1 .item_thumb .thumb_icon a,.full_meta span.meta_format,.review_footer span,.rating_hover .result,.transition_line,.layout_post_2 .item_thumb .thumb_icon a,.list_posts .post .item_thumb .thumb_icon a,.wide_slider .bx-wrapper .bx-controls-direction a:hover, .onsale").css("background-color", newcolor).css("background-color" + newcolor);
            jQuery("nav.site_navigation ul.menu ul.sub-menu,nav.site_navigation ul.menu > li > .content,nav.site_navigation ul.menu > li.has_dt_mega_menu > ul.dt_mega_menu,.tb_widget_tagcloud a:hover:before,#footer .tb_widget_tagcloud a:hover:before,#wide_slider_pager .box.active").css("border-color", newcolor).css("border-color" + newcolor);
        } else
        if (thiselem.parent().attr("alt") == "menu-colors") {
            jQuery(".header .header-menu, .footer .footer-widgets, .header .main-menu > ul li > ul").css("background-color", newcolor);
        }

        return false;
    });

    jQuery(".option-box div .color-bulb").click(function () {
        var thiselem = jQuery(this);
        var newcolor = thiselem.css("background-image");
        var newcolor_1 = thiselem.css("background-position");
        //var newcolor_2 = thiselem.css("background-repeat");
        var newcolor_3 = thiselem.css("background-attachment");
        var newcolor_4 = thiselem.css("background-origin");
        var newcolor_5 = thiselem.css("background-clip");
        var newcolor_6 = thiselem.css("background-color");
        var newcolor_7 = thiselem.css("background-size");
        thiselem.siblings().removeClass("active");
        thiselem.addClass("active");

        if (thiselem.parent().attr("alt") == "background") {
            jQuery("body").css("background-image", newcolor).css("background-position", newcolor_1).css("background-repeat", "repeat").css("background-attachment", newcolor_3).css("background-origin", newcolor_4).css("background-clip", newcolor_5).css("background-color", newcolor_6).css("background-size", newcolor_7);
        }

        return false;
    });

    jQuery(".option-box div .font-bulb").click(function () {
        var thiselem = jQuery(this);
        var newfont = thiselem.css("font-family");
        thiselem.siblings().removeClass("active");
        thiselem.addClass("active");

        if (thiselem.parent().attr("alt") == "font-options") {
            jQuery("h1, h2, h3, h4, h5, h6, nav.site_navigation, nav.site_navigation a, nav.top_navigation a").css("font-family", newfont);
        }

        return false;
    });

    jQuery(".option-box div .option-bulb").click(function () {
        var thiselem = jQuery(this);
        var newsize = thiselem.attr("rel");
        thiselem.siblings().removeClass("");
        thiselem.addClass("");

        if (thiselem.parent().attr("alt") == "option-box") {
            if (newsize == "boxed") {
                jQuery("#wrapper").addClass("boxed").removeClass("wide");
            } else
            if (newsize == "wide") {
                jQuery("#wrapper").removeClass("boxed").addClass("wide");
            }
        }

        return false;
    });

    jQuery(".option-box div .header-bulb, .option-box div .option-bulb").click(function () {
        var thiselem = jQuery(this);
        var newsize = thiselem.attr("rel");
        thiselem.siblings().removeClass("active");
        thiselem.addClass("active");

        if (thiselem.parent().attr("alt") == "header-box") {
            if (newsize == "style-1") {
                jQuery(".wraphead").fadeOut(function () {
                    jQuery(".wraphead").removeClass("header-2-content").addClass("header-1-content").fadeIn();
                });
            } else
            if (newsize == "style-2") {
                jQuery(".wraphead").fadeOut(function () {
                    jQuery(".wraphead").removeClass("header-1-content").addClass("header-2-content").fadeIn();
                });
            }
        }

        if (thiselem.parent().attr("alt") == "menu-box") {
            if (newsize == "single") {
                jQuery("#top-sub-menu").animate({
                    height: 0,
                    opacity: 0
                }, 180);
            } else
            if (newsize == "double") {
                jQuery("#top-sub-menu").animate({
                    height: 44,
                    opacity: 1
                }, 180);
            }
        }

        return false;
    });

    var leavetime = '';

    jQuery(".demo-settings").mouseleave(function () {
        var thiselem = jQuery(this);
        leavetime = setTimeout(function () {
            thiselem.removeClass("active");
        }, 600);
        return false;
    });

    jQuery(".demo-settings").mouseover(function () {
        clearTimeout(leavetime);
        return false;
    });

    jQuery(".demo-settings .demo-button").click(function () {
        jQuery(".demo-settings").addClass("active");
        return false;
    });
});

