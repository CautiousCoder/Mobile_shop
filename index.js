$('document').ready(function(){
    //bannar slide
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items:1,
    });

    //Top sell area
    $("#top-sale .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            760:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });

    //Special prize
    var $grid = $(".grid").isotope({
        itemSelector: ".grid-item",
        layoutMode: 'fitRows',
    });
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({filter: filterValue});
    });

    //New Phone area
    $("#new-phone .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            760:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });

    //New Phone area
    $("#latest_blog .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            760:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    //quentity increase or decrease
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");

    $qty_up.click(function(e){
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        if ($input.val() >= 0 && $input.val() <= 9) {
            $input.val(function(i, oddval){
                return ++oddval;
            });
        }
    });
    $qty_down.click(function(e){
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        if ($input.val() > 1 && $input.val() <= 10) {
            $input.val(function(i, oddval){
                return --oddval;
            });
        }
    });
}); 

