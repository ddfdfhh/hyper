$('.company_logo').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
	autoplayTimeout: 2000,
	autoplayHoverPause: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
	autoplayTimeout: 3000,
	autoplayHoverPause: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})


// SmartMenus init
$(function() {
  $('#main-menu').smartmenus({
    mainMenuSubOffsetX: -1,
    mainMenuSubOffsetY: 4,
    subMenusSubOffsetX: 6,
    subMenusSubOffsetY: -6
  });
});

// SmartMenus mobile menu toggle button
$(function() {
  var $mainMenuState = $('#main-menu-state');
  if ($mainMenuState.length) {
    // animate mobile menu
    $mainMenuState.change(function(e) {
      var $menu = $('#main-menu');
      if (this.checked) {
        $menu.hide().slideDown(250, function() { $menu.css('display', ''); });
      } else {
        $menu.show().slideUp(250, function() { $menu.css('display', ''); });
      }
    });
    // hide mobile menu beforeunload
    $(window).bind('beforeunload unload', function() {
      if ($mainMenuState[0].checked) {
        $mainMenuState[0].click();
      }
    });
  }
});

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


