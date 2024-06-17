(function ($) {

    "use strict";

    // Background Image Js
    const bgSelector = $("[data-bg-img]");
    bgSelector.each(function (index, elem) {
        let element = $(elem),
            bgSource = element.data('bg-img');
        element.css('background-image', 'url(' + bgSource + ')');
    });

    // Background Color Js
    const Bgcolorcl = $("[data-bg-color]");
    Bgcolorcl.each(function (index, elem) {
        let element = $(elem),
            Bgcolor = element.data('bg-color');
        element.css('background-color', Bgcolor);
    });

    // Margin Top Js
    $('[data-margin-top]').each(function () {
        $(this).css('margin-top', $(this).data("margin-top"));
    });

    // Margin Bottom Js
    $('[data-margin-bottom]').each(function () {
        $(this).css('margin-bottom', $(this).data("margin-bottom"));
    });

    // Offcanvas Nav Js
    var $offCanvasNav = $('.mobile-menu-items'),
        $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="mobile-menu-expand"></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .mobile-menu-expand, li .menu-title', function (e) {
        var $this = $(this);
        if ($this.parent().attr('class')) {
            if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('mobile-menu-expand'))) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active-expand');
                    $this.siblings('ul').slideUp();
                } else {
                    $this.parent('li').addClass('active-expand');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.closest('li').siblings('li').removeClass('active-expand');
                    $this.siblings('ul').slideDown();
                }
            }
        }
    });

    $(".sub-menu").parent("li").addClass("menu-item-has-children");

    // Menu Activeion Js
    var cururl = window.location.pathname;
    var curpage = cururl.substr(cururl.lastIndexOf('/') + 1);
    var hash = window.location.hash.substr(1);
    if ((curpage === "" || curpage === "/" || curpage === "admin") && hash === "") {
    } else {
        $(".header-navigation-area li").each(function () {
            $(this).removeClass("active");
        });
        if (hash != "")
            $(".header-navigation-area li a[href='" + hash + "']").parents("li").addClass("active");
        else
            $(".header-navigation-area li a[href='" + curpage + "']").parents("li").addClass("active");
    }

    // Popup Quick View JS
    var popupProduct = $(".product-quick-view-modal");
    $(".btn-product-quick-view-open").on('click', function () {
        let id = $(this).data('id');

        $.ajax({
            url: path + '/product/ajax',
            data: {id},
            method: 'GET',
            success: function (res) {
                $('.product-ajax-modal').html(res);
                popupProduct.addClass('active');
                $("body").addClass("fix");
            },
            error: function () {
                alert('Ошибка');
            }
        });
    });
    $(".btn-close, .canvas-overlay").on('click', function () {
        popupProduct.removeClass('active');
        $("body").removeClass("fix");
        $('.product-ajax-modal').html('');
    });

    // Swiper Default Slider Js
    var mainlSlider = new Swiper('.default-slider-container', {
        slidesPerView: 1,
        slidesPerGroup: 1,
        loop: true,
        speed: 500,
        spaceBetween: 0,
        effect: 'fade',
        autoHeight: true, //enable auto height
        fadeEffect: {
            crossFade: true,
        },
        navigation: {
            nextEl: '.default-slider-container .swiper-btn-next',
            prevEl: '.default-slider-container .swiper-btn-prev',
        },
    });

    // Product Single Thumb Slider Js
    var ProductNav = new Swiper('.single-product-nav-slider', {
        spaceBetween: 21,
        slidesPerView: 4,
        breakpoints: {
            550: {
                spaceBetween: 20,
            },
            0: {
                spaceBetween: 10,
            },
        }
    });
    var ProductThumb = new Swiper('.single-product-thumb-slider', {
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        thumbs: {
            swiper: ProductNav,
        }
    });

    // Product Slider Col4 Js
    var productSliderCol4 = new Swiper('.product-slider-col4-container', {
        slidesPerView: 4,
        slidesPerGroup: 1,
        allowTouchMove: false,
        spaceBetween: 30,
        speed: 600,
        navigation: {
            nextEl: '.product-swiper-btn-next',
            prevEl: '.product-swiper-btn-prev',
        },
        breakpoints: {
            1400: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
                allowTouchMove: true,
                autoplay: {
                    delay: 5000,
                },
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
                allowTouchMove: true,
                autoplay: {
                    delay: 5000,
                },
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 30,
                allowTouchMove: true,
                autoplay: {
                    delay: 5000,
                },
            },
            0: {
                slidesPerView: 1,
                spaceBetween: 30,
                allowTouchMove: true,
                autoplay: {
                    delay: 5000,
                },
            },
        }
    });

    // Product Slider Col4 Js
    var testimonialSlider = new Swiper('.testimonial-slider-container', {
        slidesPerView: 2,
        slidesPerGroup: 1,
        allowTouchMove: false,
        spaceBetween: 30,
        speed: 600,
        breakpoints: {
            1200: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            0: {
                slidesPerView: 1,
                spaceBetween: 30,
                allowTouchMove: true,
            },
        }
    });

    // Fancybox Js
    $('.image-popup').fancybox();
    $('.video-popup').fancybox();

    // Aos Js
    AOS.init({
        once: true,
        duration: 1200,
    });

    // Parallax Scene Js
    $('.scene').each(function () {
        new Parallax($(this)[0]);
    });
    // Parallax Js
    $('.parallax').jarallax({
        // Element jarallax Parallax
    });


    let countQty = 0;
    $('input.quantity').each((i, el) => {
        countQty += parseInt(el.value)
    })

    // Product Quantity JS
    var proQty = $(".pro-qty");
    proQty.append('<div class= "dec qty-btn">-</div>');
    proQty.append('<div class="inc qty-btn">+</div>');
    $('.cart__wrap').on('click', '.qty-btn', function (e) {
        e.preventDefault();
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        let productId = $button.parent().find('input').data('id');
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
            countQty++;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
                countQty--;
            } else {
                newVal = 1;
            }
        }
        let price = $button.parents('.cart-product-item').find('.product-price .price').data('price');
        let subtotalPrice = price * newVal;
        $button.parents('.cart-product-item').find('.product-subtotal .price').html(subtotalPrice + 'р.')
        let countPrice = 0;
        $('.cart-product-item').each((i, el) => {
            countPrice += parseInt($(el).find('.product-subtotal .price').text());
        })
        $('#final__sum').html(countPrice + 'р.');
        $('#final__qty').html(countQty);
        $('.shop-count').html(countQty);
        $button.parent().find('input').val(newVal);

        $.ajax({
            url: path + '/cart/update',
            data: {id: productId, qty: newVal},
            type: 'GET',
            success: function (res) {
            },
            error() {
                console.log('Ошибка');
            }
        });
    });

    $('.product-quick-action').on('click', '.qty-btn', function (e) {
        e.preventDefault();
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
            countQty++;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
                countQty--;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    })

    let reslide;
    // Slider Range Js
    $('#price-range').slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        step: 100,
        slide: function (event, ui) {
            $('.ui-slider-handle:eq(0)').html('<span>' + ui.values[0] + 'р' + '</span>');
            $('.ui-slider-handle:eq(1)').html('<span>' + ui.values[1] + 'р' + '</span>');

            if (reslide){
                clearTimeout(reslide);
            }
            reslide = setTimeout(function(){
                filterPrice(ui.values);
            }, 500);

        }
    });
    $('.ui-slider-handle:eq(0)').html('<span>' + $("#price-range").slider("values", 0) + 'р' + '</span>');
    $('.ui-slider-handle:eq(1)').html('<span>' + $("#price-range").slider("values", 1) + 'р' + '</span>');

    // Review Form JS
    $(".review-write-btn").on('click', function () {
        $(".reviews-form-area, .review-write-btn").toggleClass("show").focus();
    });

    // Ajax Contact Form JS
    var form = $('#contact-form');
    var formMessages = $('.form-message');

    $(form).submit(function (e) {
        e.preventDefault();
        var formData = form.serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData
        }).done(function (response) {
            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('alert alert-danger');
            $(formMessages).addClass('alert alert-success fade show');

            // Set the message text.
            formMessages.html("<button type='button' class='btn-close' data-bs-dismiss='alert'>&times;</button>");
            formMessages.append(response);

            // Clear the form.
            $('#contact-form input,#contact-form textarea').val('');
        }).fail(function (data) {
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('alert alert-success');
            $(formMessages).addClass('alert alert-danger fade show');

            // Set the message text.
            if (data.responseText === '') {
                formMessages.html("<button type='button' class='btn-close' data-bs-dismiss='alert'>&times;</button>");
                formMessages.append(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occurred and your message could not be sent.');
            }
        });
    });

    // scrollToTop Js
    function scrollToTop() {
        var $scrollUp = $('#scroll-to-top'),
            $lastScrollTop = 0,
            $window = $(window);
        $window.on('scroll', function () {
            var st = $(this).scrollTop();
            if (st > $lastScrollTop) {
                $scrollUp.removeClass('show');
            } else {
                if ($window.scrollTop() > 120) {
                    $scrollUp.addClass('show');
                } else {
                    $scrollUp.removeClass('show');
                }
            }
            $lastScrollTop = st;
        });
        $scrollUp.on('click', function (evt) {
            $('html, body').animate({scrollTop: 0}, 50);
            evt.preventDefault();
        });
    }

    scrollToTop();


    // =========================== Модификации товара ===========================

    $('.size-list .size-item').on('click', function () {
        // let price = $(this).data('price');
        $('.size-list .size-item').each((item, el) => {
            $(el).removeClass('active');
        })

        $(this).addClass('active');
        $('#mod-size').val($(this).data('id'))

        // modPrice(price);
        $('.sale__product span').text(salePercent())
    });

    function modPrice(price) {
        if (oldPrice) {
            if (price) {
                $('.old_price > del').text(parseInt(oldPrice) + parseInt(price));
                let newOldPrice = oldPrice + price;
                let percent = parseInt(newOldPrice) * parseInt(percentSale) / 100
                let newPrice = newOldPrice - percent
                $('.base__price > span').text(newPrice);
            } else {
                $('.old_price > del').text(parseInt(oldPrice));
                $('.base__price > span').text(parseInt(basePrice));
            }
        } else {
            if (price) {
                $('.base__price > span').text(parseInt(basePrice) + parseInt(price));
            } else {
                $('.base__price > span').text(parseInt(basePrice));
            }
        }
    }

    function salePercent() {
        let oldPrice = $('.old_price > del').text();
        let price = $('.base__price > span').text();
        let difference = parseInt(oldPrice) - parseInt(price);
        let sale = parseInt(difference) * 100 / parseInt(oldPrice);
        return Math.ceil(sale);
    }

    // =========================== /Модификации товара ===========================

    // =========================== Корзина ===========================

    // $('body').on('click', '.add-cart1, .show-mini-cart1', async function (e) {
    //     e.preventDefault();
    //     if(this.parentNode.classList.contains('product-quick-action')){
    //         ym(97229591,'reachGoal','add-to-cart-in-product')
    //     }else if(this.parentNode.classList.contains('product-action')){
    //         ym(97229591,'reachGoal','add-to-cart-in-listing');
    //     }
    //     const {value: email} = await Swal.fire({
    //         title: "Магазин в разработке.",
    //         html: "<b>Приносим свои извинения!</b><br>Оставьте свой email и мы пришлем Вам уведомление об открытии",
    //         input: 'email',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: "Оставить email",
    //         cancelButtonText: "Закрыть",
    //         confirmButtonColor: "#0be5a1",
    //         cancelButtonColor: primaryColor,
    //         validationMessage: "Введите корректный email!",
    //         customClass: {
    //             input: 'alert-email',
    //             confirmButton: 'alert-confirm',
    //         },
    //     });

    //     if (email) {
            
    //         $.ajax({
    //             url: path + '/user/subscription',
    //             type: 'POST',
    //             data: {email},
    //             success: function (res) {
    //                 if(res == 'Success'){
    //                     Swal.fire({
    //                         html: `Спасибо! Вам придет сообщение на email: ${email}`,
    //                         icon: 'success',
    //                     });
    //                 }else{
    //                     Swal.fire({
    //                         html: res,
    //                         icon: 'warning',
    //                     });
    //                 }
                    
    //             },
    //             error() {
    //                 console.log('Ошибка');
    //             }
    //         });
    //     }
    // })

    let myOffcanvas = document.getElementById('AsideOffcanvasCart');
    let bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)

    $('body').on('click', '.add-cart', function (e) {
        e.preventDefault();
        let id = $(this).data('id'),
            qty = $('.pro-qty input') ? $('.pro-qty input').val() : 1,
            modSize = $('[name=mod-size]') ? $('[name=mod-size]').val() : null;

        $.ajax({
            url: path + '/cart/add',
            type: 'GET',
            data: {id, qty, modSize},
            success: function (res) {
                showCart(res);
            },
            error() {
                console.log('Ошибка');
            }
        });
    })

    function showCart(cart) {

        if ($.trim(cart) == '<h3>Корзина пуста</h3>') {
            $('#mini-cart-btns').css('display', 'none');
        } else {
            $('#mini-cart-btns').css('display', 'block');
        }
        $('#mini-cart-body').html(cart);
        bsOffcanvas.show();

        if ($('.cart-qty-count').text()) {
            $('.shop-count').text($('.cart-qty-count').text());
        } else {
            $('.shop-count').text(0);
        }
    }

    function updateCartPage(res) {
        $('.cart__wrap').html(res)
        let proQty = $('.cart__wrap').find('.pro-qty');
        proQty.append('<div class= "dec qty-btn">-</div>');
        proQty.append('<div class="inc qty-btn">+</div>');

        if ($('#final__qty').text()) {
            $('.shop-count').text($('#final__qty').text());
        } else {
            $('.shop-count').text(0);
        }
    }

    function getCart() {
        $.ajax({
            url: path + '/cart/show',
            type: 'GET',
            success: function (res) {
                showCart(res)
            },
            error() {
                console.log('Ошибка');
            }
        });
    }

    $('.show-mini-cart').on('click', getCart);

    $('#mini-cart-body').on('click', '.remove', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let cart = $(this).data('cart')
        $.ajax({
            url: path + '/cart/delete',
            data: {id, cart},
            type: 'GET',
            success: function (res) {
                if (res) {
                    showCart(res);
                }
            },
            error() {
                console.log('Ошибка');
            }
        });
    })

    $('.cart__wrap').on('click', '.remove', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let cart = $(this).data('cart')

        $.ajax({
            url: path + '/cart/delete',
            data: {id, cart},
            type: 'GET',
            success: function (res) {
                if (res) {
                    updateCartPage(res)
                }
            },
            error() {
                console.log('Ошибка');
            }
        });
    })

    $('body').on('click', '.clear-cart', function (e) {
        e.preventDefault();

        $.ajax({
            url: path + '/cart/clear',
            type: 'POST',
            success: function (res) {
                if (res) {
                    showCart(res)
                }
            },
            error() {
                console.log('Ошибка');
            }
        });
    })
    $('body').on('click', '.clear-cart-page', function (e) {
        e.preventDefault();

        let cart = $(this).data('cart')

        $.ajax({
            url: path + '/cart/clear',
            data: {cart},
            type: 'POST',
            success: function (res) {
                if (res) {
                    $('.cart__wrap').html(res)
                    $('.shop-count').text(0);
                }
            },
            error() {
                console.log('Ошибка');
            }
        });
    })

    // =========================== /Корзина ===========================

    // =========================== Поиск ===========================

    $('.search-form').on('input', function () {
        if ($(this).val().length >= 3) {
            $.ajax({
                url: path + '/search/live',
                type: 'GET',
                data: {query: $(this).val()},
                success: function (res) {
                    if (res) {
                        $('.search-result ul').html(res);
                        $('.search-result').addClass('vis');
                    }
                },
                error() {
                    console.log('Ошибка');
                }
            });
        }
    })

    // =========================== /Поиск ===========================


    $('.toggle-sub-menu').on('click', function (e) {
        e.preventDefault();
        let subMenu = $(this).parent().siblings();
        if (subMenu.hasClass('open')) {
            subMenu.removeClass('open');
            subMenu.slideUp()
            $(this).text('+')
        } else {
            subMenu.addClass('open');
            subMenu.slideDown()
            $(this).text('-')
        }
    })

    // =========================== Фильтры ===========================
    let resetFilterButton = addNode('button', 'filter__reset-btn', 'Сбросить фильтр', ['type', 'reset']);
    $('body').on('change', '.shop-sidebar input', function () {
        let checked = $('.shop-sidebar input:checked'),
            data = {},
            typeInp = $(this).data('inp');

        checked.each(function () {
            data[$(this).data('alias')] += this.value + ','
        })

        for(let item in data){
            data[item] = data[item].replace('undefined', '')
        }
        let getParams = '';
        for(let item in data){
            let values = data[item].trim().replace(/,\s*$/, '');
            let str = `${item}:${values};`;
            getParams += str;
        }
        getParams = getParams.replace(/;\s*$/, '');

        if (getParams) {
            $.ajax({
                url: location.href,
                data: {filter: getParams, type: typeInp,},
                method: 'GET',
                beforeSend: function () {
                    $('.loading_block').fadeIn(300, function(){
                        $('.product__list').hide();
                        $('body').addClass('no-scroll')
                    });
                },
                success: function (res) {
                    $('.loading_block').delay(500).fadeOut('300', function(){
                        $('.product__list').html(res).fadeIn();
                        $('body').removeClass('no-scroll');
                        let url = location.search.replace(/filter(.+?)(&|$)/g, '');
                        let newUrl = location.pathname + url + (location.search ? '&' : '?') + "filter=" + getParams;
                        newUrl = newUrl.replace('&&', '&');
                        newUrl = newUrl.replace('?&', '?');
                        history.pushState({}, '', newUrl);

                        $('body').append(resetFilterButton)

                    });
                },
                error: function () {
                    alert('Ошибка');
                }
            });
        } else {
            window.location = location.pathname
        }
    })

    if(location.search.indexOf('filter') != -1 || location.search.indexOf('price') != -1){
        $('body').append(resetFilterButton)
    }

    $('body').on('click', '.filter__reset-btn', function () {
        window.location = location.pathname
    })
    function filterPrice(data){
        if (data) {
            let price = data.join(',');
            $.ajax({
                url: location.href,
                data: {price: price},
                method: 'GET',
                beforeSend: function () {
                    $('.loading_block').fadeIn(300, function(){
                        $('.product__list').hide();
                        $('body').addClass('no-scroll')
                    });
                },
                success: function (res) {
                    $('.loading_block').delay(500).fadeOut('300', function(){
                        $('.product__list').html(res).fadeIn();
                        $('body').removeClass('no-scroll');
                        let url = location.search.replace(/price(.+?)(&|$)/g, '');
                        let newUrl = location.pathname + url + (location.search ? '&' : '?') + "price=" + price;
                        newUrl = newUrl.replace('&&', '&');
                        newUrl = newUrl.replace('?&', '?');
                        console.log(newUrl)
                        history.pushState({}, '', newUrl);
                        $('body').append(resetFilterButton)
                    });
                },
                error: function () {
                    alert('Ошибка');
                }
            });
        } else {
            window.location = location.pathname
        }
    }

    // =========================== /Фильтры ===========================

    // =========================== Wishlist ===========================

    $('.product-item').on('click', '.add-wishlist', function (e){
        e.preventDefault()
        ym(97229591,'reachGoal','add-to-cart-in-product');
        const $this = $(this);
        const id = $(this).data('id');

        $.ajax({
            url: path + '/wishlist/add',
            method: 'GET',
            data: {id: id},
            success: function (res) {
                res = JSON.parse(res);
                Swal.fire({
                    title: res.text,
                    icon: res.result,
                    confirmButtonText: "Закрыть",
                    confirmButtonColor: primaryColor,
                });
                if(res.result == 'success'){
                    $this.removeClass('add-wishlist').addClass('del-wishlist');
                }
            },
            error: function (e) {
                alert('Ошибка добавления! Попробуйте еще раз');
            }
        })
    })

    $('.product-item').on('click', '.del-wishlist', function (e){
        e.preventDefault()
        const $this = $(this);
        const id = $(this).data('id');

        $.ajax({
            url: path + '/wishlist/delete',
            method: 'GET',
            data: {id: id},
            success: function (res) {
                const url = window.location.toString();
                if(url.indexOf('wishlist') !== -1){
                    window.location = url;
                }else{
                    res = JSON.parse(res);
                    Swal.fire({
                        title: res.text,
                        icon: res.result,
                        confirmButtonText: "Закрыть",
                        confirmButtonColor: primaryColor,
                    });
                    if(res.result == 'success'){
                        $this.removeClass('del-wishlist').addClass('add-wishlist');
                    }
                }
            },
            error: function (e) {
                alert('Ошибка добавления! Попробуйте еще раз');
            }
        })
    })

    // =========================== /Wishlist ===========================

    // =========================== Send Mail ===========================

    $('#mail-form').on('submit', function (e) {
        e.preventDefault();
        let $this = $(this);
        $('.error-name').html('');
        $('.error-phone').html('');

        $.ajax({
            url: path + '/contacts',
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function(data){
                let res = JSON.parse(data);
                if(res.success){
                    Swal.fire({
                        title: res.success,
                        icon: 'success',
                        confirmButtonText: "Закрыть",
                        confirmButtonColor: primaryColor,
                    });
                    $this.trigger("reset");
                }else{
                    for (let key in res){
                        let inp = $this.find(`.error-${key}`);
                        res[key].forEach(el => {
                            inp.append(`<small class="error-message">${el}</small>`);
                        })
                    }
                }
            },
            error: function (e) {
                alert('Ошибка!');
            }
        });

    })

    // =========================== /Send Mail ===========================

    // =========================== add Node ===========================

    function addNode(tagName = 'div', className = '', text = '', attrs = []){
        let element = document.createElement(tagName);
        if(className){
            element.classList.add(className);
        }
        if(attrs && attrs.length){
            element.setAttribute(attrs[0], attrs[1]);
        }
        element.innerText = text

        return element;
    }

    // =========================== add Node ===========================

})(window.jQuery);

