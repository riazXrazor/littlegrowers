(function ($) {
    "use strict";

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on("load", function () {
        $(".preloader").fadeOut("slow", function () {
            $(this).remove();
        });
    });

    // :: 2.0 Nav Active Code
    if ($.fn.classyNav) {
        $("#alazeaNav").classyNav();
    }

    // :: 3.0 Search Active Code
    $("#searchIcon").on("click", function () {
        $(".search-form").toggleClass("active");
    });
    $(".closeIcon").on("click", function () {
        $(".search-form").removeClass("active");
    });

    // :: 4.0 Sliders Active Code
    if ($.fn.owlCarousel) {
        var welcomeSlide = $(".hero-post-slides");
        var testiSlides = $(".testimonials-slides");
        var portfolioSlides = $(".portfolio-slides");

        welcomeSlide.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            center: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
        });

        testiSlides.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 700,
            animateIn: "fadeIn",
            animateOut: "fadeOut",
        });

        portfolioSlides.owlCarousel({
            items: 2,
            margin: 30,
            loop: true,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            smartSpeed: 700,
            center: true,
        });
    }

    // :: 5.0 Masonary Gallery Active Code
    if ($.fn.imagesLoaded) {
        $(".alazea-portfolio").imagesLoaded(function () {
            // filter items on button click
            $(".portfolio-filter").on("click", "button", function () {
                var filterValue = $(this).attr("data-filter");
                $grid.isotope({
                    filter: filterValue,
                });
            });
            // init Isotope
            var $grid = $(".alazea-portfolio").isotope({
                itemSelector: ".single_portfolio_item",
                percentPosition: true,
                masonry: {
                    columnWidth: ".single_portfolio_item",
                },
            });
        });
    }

    // :: 6.0 magnificPopup Active Code
    if ($.fn.magnificPopup) {
        $(".portfolio-img, .product-img").magnificPopup({
            gallery: {
                enabled: true,
            },
            type: "image",
        });
        $(".video-icon").magnificPopup({
            type: "iframe",
        });
    }

    // :: 7.0 Barfiller Active Code
    if ($.fn.barfiller) {
        $("#bar1").barfiller({
            tooltip: true,
            duration: 1000,
            barColor: "#70c745",
            animateOnResize: true,
        });
        $("#bar2").barfiller({
            tooltip: true,
            duration: 1000,
            barColor: "#70c745",
            animateOnResize: true,
        });
        $("#bar3").barfiller({
            tooltip: true,
            duration: 1000,
            barColor: "#70c745",
            animateOnResize: true,
        });
        $("#bar4").barfiller({
            tooltip: true,
            duration: 1000,
            barColor: "#70c745",
            animateOnResize: true,
        });
    }

    // :: 8.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>',
        });
    }

    // :: 9.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $(".counter").counterUp({
            delay: 10,
            time: 2000,
        });
    }

    // :: 10.0 Sticky Active Code
    if ($.fn.sticky) {
        $(".alazea-main-menu").sticky({
            topSpacing: 0,
        });
    }

    // :: 11.0 Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    $("#orderby-filter").change(function () {
        let val = $(this).val().split("__");
        $("#filter-product-form").find('[name="orderby"]').val(val[0]);
        $("#filter-product-form").find('[name="order_type"]').val(val[1]);
        $("#filter-product-form").submit();
    });

    $("#sort-by-checkbox input[type='checkbox']").change(function () {
        $("#sort-by-checkbox input[type='checkbox']").prop("checked", false);
        $(this).prop("checked", true);
        let val = $(this).val().split("__");
        $("#filter-product-form").find('[name="orderby"]').val(val[0]);
        $("#filter-product-form").find('[name="order_type"]').val(val[1]);
        $("#filter-product-form").submit();
    });

    $("#perpage-filter").change(function () {
        $("#filter-product-form").find('[name="perpage"]').val($(this).val());
        $("#filter-product-form").submit();
    });

    $("#filter-category-select input").change(function () {
        if ($(this).val() == "All") {
            if ($(this).is(":checked")) {
                $("#filter-category-select input").attr("checked", true);
            } else {
                $("#filter-category-select input").attr("checked", false);
            }
        }
        const vals = [];
        $("#filter-category-select input:checked").each(function () {
            vals.push($(this).val());
        });
        $("#filter-product-form")
            .find('[name="filter_category"]')
            .val(vals.join(","));
        $("#filter-product-form").submit();
    });

    $(".cart").on("click", function (e) {
        $(this).find(".shopping-cart").toggle();
    });

    // :: 12.0 Price Range Active Code
    $(".slider-range-price").each(function () {
        var min = jQuery(this).data("min");
        var max = jQuery(this).data("max");
        var unit = jQuery(this).data("unit");
        var value_min = jQuery(this).data("value-min");
        var value_max = jQuery(this).data("value-max");
        var label_result = jQuery(this).data("label-result");
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            stop: function (event, ui) {
                if (
                    $("#filter-product-form")
                        .find('[name="min_price"]')
                        .val() &&
                    $("#filter-product-form").find('[name="max_price"]').val()
                ) {
                    $("#filter-product-form").submit();
                }
            },
            slide: function (event, ui) {
                var result =
                    label_result +
                    " " +
                    unit +
                    ui.values[0] +
                    " - " +
                    unit +
                    ui.values[1];
                console.log(t);
                t.closest(".slider-range").find(".range-price").html(result);
                $("#filter-product-form")
                    .find('[name="min_price"]')
                    .val(ui.values[0]);
                $("#filter-product-form")
                    .find('[name="max_price"]')
                    .val(ui.values[1]);
            },
        });
    });

    // :: 13.0 prevent default a click
    $('a[href="#"]').on("click", function ($) {
        $.preventDefault();
    });

    // :: 14.0 wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }
})(jQuery);
