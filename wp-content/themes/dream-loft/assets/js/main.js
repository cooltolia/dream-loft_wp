(function($){
  /* ---------набор функций--------------- */

  //автоувеличение ширины инпута
  function resizeInput() {
    var l =  $(this).val().length
    $(this).css('width', (l*16)+3);
  }
  //автоувеличение ширины инпута

  //получить ральный верхний левый угол обьекта в рекурсии
  var cumulativeOffset = function(element) {
    var top = 0, left = 0;
    do {
      top += element.offsetTop  || 0;
      left += element.offsetLeft || 0;
      element = element.offsetParent;
    } while(element);

    return {
      top: top,
      left: left
    };
  }; 
  //получить ральный верхний левый угол обьекта в рекурсии

  /* биндим контекст */
  function bind(func, context) { // первое перменная - функция, второе контекст
    return function() { // возвращаем анаонимную функцию, при ее вызове выоветься func.apply с уже имеющимя контекстом из переменной context
      return func.apply(context, arguments); //arguments любое кол во аргументов. такой вызов свяжет функцию с ранее переданным аргументом
    };
  }

  /* ---------ннабор функций---------н */



  $(document).ready(function(){
    $("body").removeClass("pageload");

    //scroll-to  - прокрутчик
    $(".scroll-to").click(function() {
      var id = $(this).attr("rel");
      var to = $("#"+id).offset().top-10;
      $('html, body').animate({
        scrollTop: to
      }, 500);
    });

    //f-ajax   - отправка форм
    $('.f-ajax').on('submit', function(event){
      event.preventDefault();
      var $form = $(this);

      var data = $form.serialize();
      data['token'] = "tnbm567sgfg4556sdfDSg";

      $.ajax({
        url: $form.attr("action"),
        type: 'POST',
        data: '',
        success: function(result) {
          if(result == "OK"){
            alert("Заявка отправлена!");       
          }
          else
            alert("Произошла ошибка!");
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert("Произошла ошибка!");
        }
      });
    });

    ;

    (function () {

    

        var $mobileNav = $('.mobile-nav'),

            $allSubMenus = $('.mobile-nav__submenu, .mobile-nav__thirdmenu');

            

            

        $(".hamburger").click(function () {

            /** hide all visible inner menus */

            $allSubMenus.removeClass('active');

            $allSubMenus.slideUp();

    

            $(this).toggleClass('active');

            $mobileNav.toggleClass('active')

    

            if ($mobileNav.hasClass('active')) {

                $mobileNav.fadeIn();

            } else {

                $mobileNav.fadeOut();

            }

        });

    

    })();

    
    var result = $(".langs__result");
    var select = $('#lang_choice_1');
    var item = $(".langs__item");
    var firstItem = $(".langs__item:first-child");
    var all = $("*:not(.langs__result)");
    result.css("background-image", firstItem.css("background-image"));

    result.on("click", function (e) {
        e.stopPropagation();
        $(".langs__dd").toggleClass("active");
    });

    all.on("click", function () {
        $(".langs__dd").removeClass("active");
    });

    $(item).on("click", function () {
        var $this = $(this);
        result.html($this.html());
        var attr = $this.attr("rel");
        result.css("background-image", $this.css("background-image"));
        $(".langs__dd").removeClass("active");
        var others = select.find('option')
        var langLink = $('.lang-item a[lang="' + attr + '"]');

        langLink[0].click();
        
    })
    
    (function() {

    

        var $grid = $('.index-catalog__grid').imagesLoaded(function () {

            // init Masonry after all images have loaded

            console.log('есть картинки');

            if ($(window).width() < 480) return;

    

            $grid.masonry({

                itemSelector: '.index-catalog__item',

                columnWidth: 300,

                gutter: 5,

            });

        });

    

    }());

    

    
    

    
    

    
    

    
    (function () {

        /** main-nav scripts */

    

    

        /** mobile-nav scripts */

        var $mobileNav = $('.mobile-nav'),

            $firstLevelLinks = $('.mobile-nav__link'),

            $secondLevelLinks = $('.mobile-nav__sublink');

    

        $firstLevelLinks.each(function () {

            if ($(this).next('ul').length > 0)

                $(this).addClass('has-submenu');

        })

    

        $firstLevelLinks.on('click', function (e) {

            var $subMenu = $(this).next();

    

            if ($subMenu.length > 0) {

                e.preventDefault();

                e.stopPropagation()

    

                $subMenu.toggleClass('active');

                $(this).addClass('has-submenu');

                $(this).toggleClass('active');

    

                if ($subMenu.hasClass('active')) {

                    $subMenu.slideDown();

                } else {

                    $subMenu.slideUp();

                }

            } else {

                return;

            }

    

        });

    

        $secondLevelLinks.on('click', function (e) {

            e.preventDefault();

            e.stopPropagation()

            var $thirdMenu = $(this).next();

            $thirdMenu.toggleClass('active')

    

    

            if ($thirdMenu.hasClass('active')) {

                $thirdMenu.slideDown();

            } else {

                $thirdMenu.slideUp();

            }

        });

    })()

    
    /* ;(function(){

        var zoom = 17;

    

        if ( $(window).width() < 480 ) {

            zoom = 16;

        }

    

        var adress;

        adress = [59.9315411964636, 30.351687840589967];

    

        ymaps.ready(function () {

            var myMap;

            var pointA = "Санкт-Петербург, метро Маяковская",

                pointB = adress,

                multiRoute = new ymaps.multiRouter.MultiRoute({

                    referencePoints: [

                        pointA,

                        pointB

                    ],

                    params: {

                        //Тип маршрутизации - пешеходная маршрутизация.

                        routingMode: 'pedestrian',

                    },

                }, {

                        // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.

                        //boundsAutoApply: true

                        wayPointIconLayout: "none",

                        routeActivePedestrianSegmentStrokeStyle: "solid",

                        routeActivePedestrianSegmentStrokeColor: "#ff0000"

                    });

            ymaps.geocode(adress).then(function (res) {

                myMap = new ymaps.Map('map', {

                    center: res.geoObjects.get(0).geometry.getCoordinates(),

                    zoom: zoom

                });

                var myPlacemark = new ymaps.Placemark(myMap.getCenter(), {

                    hintContent: 'Собственный значок метки',

                    balloonContent: 'Это красивая метка'

                }, {

                        // Опции.

                        // Необходимо указать данный тип макета.

                        iconLayout: 'default#image',

                        // Своё изображение иконки метки.

                        iconImageHref: '../images/map-icon.png',

                        // Размеры метки.

                        iconImageSize: [30, 30],

                        // Смещение левого верхнего угла иконки относительно

                        // её "ножки" (точки привязки).

                        iconImageOffset: [-15, -30]

                    });

    

                myMap.geoObjects.add(myPlacemark);

                myMap.geoObjects.add(multiRoute);

                myMap.behaviors.disable('scrollZoom');

            });

    

        });

    })(); */

    
    $(":input").inputmask();

    
    

    
    ;(function () {

    

        var $hiding = $('.hiding, .showing'),

            $trigger = $('a[href="#description"'),

            $closeDesc = $('.product-page__description-text span');

    

        $trigger.on('click', function() {

            $hiding.removeClass('hidden')

            if ($hiding.hasClass('hiding')) {

                $hiding.removeClass('hiding');

                $hiding.addClass('showing');

                $trigger.text('Скрыть описание');

            } else {

                $hiding.removeClass('showing');

                $hiding.addClass('hiding');

                $trigger.text('Развернуть описание');

            }

        });

    

        $closeDesc.on('click', function(e) {

            $hiding.addClass('hiding');

            $hiding.removeClass('showing');

            $trigger.text('Развернуть описание');

        });

    

    })();

    
    (function() {

    

        $('.product-slider__main').slick({

            slidesToShow: 1,

            slidesToScroll: 1,

            arrows: true,

            fade: true,

            asNavFor: '.product-slider__thumbs'

        });

    

        $('.product-slider__thumbs').slick({

            slidesToShow: 3,

            slidesToScroll: 3,

            asNavFor: '.product-slider__main',

            dots: false,

            arrows: false,

            centerMode: true,

            focusOnSelect: true

        });

    

    

        $('.zoom').zoom({

            

        });

    

    }());

    
    (function() {

    

        var item = $('.product-tabs__tab'),

            content = $('.product-tabs__content'),

            activeItem = $('.product-tabs__tab.active'),

            rel = activeItem.attr('rel');

    

        $('[data=' + rel + ']').show();

    

        item.on('click', function(){

            var $this = $(this),

                rel = $this.attr('rel')

    

            if($this.hasClass('active')) {

                return;

            }

            else {

                item.removeClass('active');

                $this.addClass('active');

                content.hide();

                $('[data=' + rel + ']').show();

            }

        });

    

    }());

    

    
    
  });

})(jQuery)