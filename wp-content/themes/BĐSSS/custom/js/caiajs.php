<?php

// Thêm file jquery
add_action('wp_footer', 'caia_add_file_jquery');
function caia_add_file_jquery(){
?>
<script>
  jQuery(document).ready( function($){
    if ( $(window).width() < 960 ) {
		var head = $('.site-header');
		var list = $('#responsive-menu');
		var menu = $('#click-menu');
		var dau = $('.content-dautrang');
		$(window).scroll(function () {
			if ($(this).scrollTop() > 60) {
				head.addClass("f-head");
				list.addClass("f-list");
				menu.addClass("f-menu");
				dau.addClass("f-dau");
			}else {
				head.removeClass("f-head");
				list.removeClass("f-list");
				menu.removeClass("f-menu");
				dau.removeClass("f-dau");
			}
		});	

    	$('.site-header .widget_search .widgettitle').on('click', function() {
      $(this).toggleClass('active');
      $(this).parent().find('.search-form').toggleClass('active');
  });
  }
  }
)
</script>
<script>

	document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".content-thanhtuu ul li strong");

  counters.forEach(counter => {
    const target = parseInt(counter.textContent.replace(/\D/g, "")); 
    counter.textContent = "0"; // Bắt đầu từ 0

    let count = 0;
    const speed = 30; // ms mỗi lần tăng
    const increment = Math.ceil(target / 100); // tăng từng bước nhỏ

    const updateCount = () => {
      count += increment;
      if (count >= target) {
        counter.textContent = target;
      } else {
        counter.textContent = count;
        setTimeout(updateCount, speed);
      }
    };

    updateCount();
  });
});

jQuery(document).ready(function($) {

	$('.site-header .textwidget p').click(function() {
			$('.nhantuvan').fadeIn();
	});

	$('.nhantuvan .widget_caldera_forms_widget .widgettitle').click(function() {
			$('.nhantuvan').fadeOut();
    	
	});
}
)


jQuery(document).ready(function($) {
  $('.nhanbaogia span').click(function() {
    $('.nhantuvan').fadeIn();
    $('.nhantuvan .widget_caldera_forms_widget').fadeIn();
  });

  $('.nhantuvan .close-popup').click(function() {
    $('.nhantuvan').fadeOut();
  });
});



</script>

<!-- Trang theo catergory -->
<script>
jQuery(document).ready(function ($) {
    // Sự kiện cho category cha
    $(document).on('click', '.cat-item:not(.cat-child)', function () {
        $('.cat-item').removeClass('active');
        $(this).addClass('active');
        // Hiển thị sản phẩm theo category
        var cat = $(this).data('cat');
        $('.product-list').hide();
        $('.product-list.' + cat).show().css('display', 'grid');
    });

    // Sự kiện cho category con
    $(document).on('click', '.cat-child', function (e) {
        e.stopPropagation();
        $('.cat-child').removeClass('active');
        $(this).addClass('active');
        // Giữ active cho cha
        var $parent = $(this).closest('.sub-cat-list').prev('.cat-item');
        $('.cat-item:not(.cat-child)').removeClass('active');
        $parent.addClass('active');
        // Hiển thị sản phẩm theo category con
        var cat = $(this).data('cat');
        $('.product-list').hide();
       $('.product-list.' + cat).show().css('display', 'grid');
    });
});

// đong icon +/-
jQuery(document).ready(function ($) {
    $(document).on('click', '.cat-item', function (e) {
        if ($(this).hasClass('cat-child')) return;

        var $li = $(this);
        var $subcat = $li.next('.sub-cat-list');
        var $icon = $li.find('.toggle-subcat');

        if ($subcat.length) {
            $subcat.slideToggle(200, function() {
                // Đổi icon sau khi hoàn thành toggle
                if ($subcat.is(':visible')) {
                    $icon.text('-');
                } else {
                    $icon.text('+');
                }
            });

        }
    });
});
</script>


<script>
jQuery(document).ready(function ($) {
 const $container = $('<swiper-container class="swiper-kimloai"  loop="false" autoplay="true" autoplay-delay="3000" pause-on-mouse-enter="true" disable-on-interaction="false" speed="800" effect="slide" ></swiper-container>');
// 👇 Gán thuộc tính breakpoints
$container.attr('breakpoints', JSON.stringify({
  0: {
    slidesPerView: 2,
    spaceBetween: 16,
    grid: {
      rows: 1,
      fill: 'row'
    }
  },
  768: {
    slidesPerView: 4,
    spaceBetween: 24,
    grid: {
      rows: 2,
      fill: 'row'
    }
  }
}));



  $('.content-temkimloai .main-posts').children().each(function () {
    const $slide = $('<swiper-slide></swiper-slide>');
    $slide.append($(this).clone());
    $container.append($slide);
  });

  $('.content-temkimloai .main-posts').replaceWith($container);

  customElements.whenDefined('swiper-container').then(() => {
    const swiperEl = document.querySelector('.swiper-kimloai');
    const btnNext = document.querySelector('.custom-next-kimloai');
    const btnPrev = document.querySelector('.custom-prev-kimloai');

    function updateNavButtons(swiper) {
      if (swiper.isBeginning) {
        btnPrev.setAttribute('disabled', 'true');
      } else {
        btnPrev.removeAttribute('disabled');
      }

      if (swiper.isEnd) {
        btnNext.setAttribute('disabled', 'true');
      } else {
        btnNext.removeAttribute('disabled');
      }
    }

    function bindCustomButtons() {
      const swiper = swiperEl.swiper;
      if (!swiper) {
        setTimeout(bindCustomButtons, 100);
        return;
      }

      btnNext.addEventListener('click', function () {
        swiper.slideNext();
      });
      btnPrev.addEventListener('click', function () {
        swiper.slidePrev();
      });

      swiper.on('slideChange', () => updateNavButtons(swiper));
      swiper.on('afterInit', () => updateNavButtons(swiper));

      updateNavButtons(swiper);
    }

    bindCustomButtons();
  });
});

</script>

<script>
jQuery(document).ready(function ($) {
  const $container = $('<swiper-container class="swiper-nhua" autoplay="true" autoplay-delay="3000" pause-on-mouse-enter="true" disable-on-interaction="false" speed="800" effect="slide" slides-per-view="4" grid-rows="2" grid-fill="row" space-between="24"></swiper-container>');

$container.attr('breakpoints', JSON.stringify({
  0: {
    slidesPerView: 2,
    spaceBetween: 16,
    grid: {
      rows: 1,
      fill: 'row'
    }
  },
  768: {
    slidesPerView: 4,
    spaceBetween: 24,
    grid: {
      rows: 2,
      fill: 'row'
    }
  }
}));

  $('.content-temnhua .main-posts').children().each(function () {
    const $slide = $('<swiper-slide></swiper-slide>');
    $slide.append($(this).clone());
    $container.append($slide);
  });

  $('.content-temnhua .main-posts').replaceWith($container);

  customElements.whenDefined('swiper-container').then(() => {
    const swiperEl = document.querySelector('.swiper-nhua');
    const btnNext = document.querySelector('.custom-next-nhua');
    const btnPrev = document.querySelector('.custom-prev-nhua');

    function updateNavButtons(swiper) {
      if (swiper.isBeginning) {
        btnPrev.setAttribute('disabled', 'true');
      } else {
        btnPrev.removeAttribute('disabled');
      }

      if (swiper.isEnd) {
        btnNext.setAttribute('disabled', 'true');
      } else {
        btnNext.removeAttribute('disabled');
      }
    }

    function bindCustomButtons() {
      const swiper = swiperEl.swiper;
      if (!swiper) {
        setTimeout(bindCustomButtons, 100);
        return;
      }

      // Gắn sự kiện click
      btnNext.addEventListener('click', function () {
        swiper.slideNext();
      });
      btnPrev.addEventListener('click', function () {
        swiper.slidePrev();
      });

      // Cập nhật trạng thái khi khởi tạo và khi slide thay đổi
      swiper.on('slideChange', () => updateNavButtons(swiper));
      swiper.on('afterInit', () => updateNavButtons(swiper));

      // Gọi ban đầu
      updateNavButtons(swiper);
    }

    bindCustomButtons();
  });
});
</script>


<script>
jQuery(document).ready(function ($) {
  const $container = $('<swiper-container class="swiper-temnganhnghe" autoplay="true" autoplay-delay="3000" pause-on-mouse-enter="true" disable-on-interaction="false" speed="800" effect="slide" slides-per-view="4" grid-rows="2" grid-fill="row" space-between="24"></swiper-container>');

$container.attr('breakpoints', JSON.stringify({
  0: {
    slidesPerView: 2,
    spaceBetween: 16,
    grid: {
      rows: 1,
      fill: 'row'
    }
  },
  768: {
    slidesPerView: 4,
    spaceBetween: 24,
    grid: {
      rows: 2,
      fill: 'row'
    }
  }
}));

  $('.content-temnganhnghe .main-posts').children().each(function () {
    const $slide = $('<swiper-slide></swiper-slide>');
    $slide.append($(this).clone());
    $container.append($slide);
  });

  $('.content-temnganhnghe .main-posts').replaceWith($container);

  customElements.whenDefined('swiper-container').then(() => {
    const swiperEl = document.querySelector('.swiper-temnganhnghe');
    const btnNext = document.querySelector('.custom-next-temnganhnghe');
    const btnPrev = document.querySelector('.custom-prev-temnganhnghe');

    function updateNavButtons(swiper) {
      if (swiper.isBeginning) {
        btnPrev.setAttribute('disabled', 'true');
      } else {
        btnPrev.removeAttribute('disabled');
      }

      if (swiper.isEnd) {
        btnNext.setAttribute('disabled', 'true');
      } else {
        btnNext.removeAttribute('disabled');
      }
    }

    function bindCustomButtons() {
      const swiper = swiperEl.swiper;
      if (!swiper) {
        setTimeout(bindCustomButtons, 100);
        return;
      }

      // Gắn sự kiện click
      btnNext.addEventListener('click', function () {
        swiper.slideNext();
      });
      btnPrev.addEventListener('click', function () {
        swiper.slidePrev();
      });

      // Cập nhật trạng thái khi khởi tạo và khi slide thay đổi
      swiper.on('slideChange', () => updateNavButtons(swiper));
      swiper.on('afterInit', () => updateNavButtons(swiper));

      // Gọi ban đầu
      updateNavButtons(swiper);
    }

    bindCustomButtons();
  });
});
</script>

<script>
jQuery(document).ready(function ($) {
  const $container = $('<swiper-container class="swiper-temvatlieu" autoplay="true" autoplay-delay="3000" pause-on-mouse-enter="true" disable-on-interaction="false" speed="800" effect="slide" slides-per-view="4" grid-rows="2" grid-fill="row" space-between="24"></swiper-container>');

$container.attr('breakpoints', JSON.stringify({
  0: {
    slidesPerView: 2,
    spaceBetween: 16,
    grid: {
      rows: 1,
      fill: 'row'
    }
  },
  768: {
    slidesPerView: 4,
    spaceBetween: 24,
    grid: {
      rows: 2,
      fill: 'row'
    }
  }
}));

  $('.content-temvatlieu .main-posts').children().each(function () {
    const $slide = $('<swiper-slide></swiper-slide>');
    $slide.append($(this).clone());
    $container.append($slide);
  });

  $('.content-temvatlieu .main-posts').replaceWith($container);

  customElements.whenDefined('swiper-container').then(() => {
    const swiperEl = document.querySelector('.swiper-temvatlieu');
    const btnNext = document.querySelector('.custom-next-temvatlieu');
    const btnPrev = document.querySelector('.custom-prev-temvatlieu');

    function updateNavButtons(swiper) {
      if (swiper.isBeginning) {
        btnPrev.setAttribute('disabled', 'true');
      } else {
        btnPrev.removeAttribute('disabled');
      }

      if (swiper.isEnd) {
        btnNext.setAttribute('disabled', 'true');
      } else {
        btnNext.removeAttribute('disabled');
      }
    }

    function bindCustomButtons() {
      const swiper = swiperEl.swiper;
      if (!swiper) {
        setTimeout(bindCustomButtons, 100);
        return;
      }

      // Gắn sự kiện click
      btnNext.addEventListener('click', function () {
        swiper.slideNext();
      });
      btnPrev.addEventListener('click', function () {
        swiper.slidePrev();
      });

      // Cập nhật trạng thái khi khởi tạo và khi slide thay đổi
      swiper.on('slideChange', () => updateNavButtons(swiper));
      swiper.on('afterInit', () => updateNavButtons(swiper));

      // Gọi ban đầu
      updateNavButtons(swiper);
    }

    bindCustomButtons();
  });
});
</script>

<script>
jQuery(document).ready(function ($) {
  const $container = $('<swiper-container class="swiper-biencongty" autoplay="true" autoplay-delay="3000" pause-on-mouse-enter="true" disable-on-interaction="false" speed="800" effect="slide" slides-per-view="4" grid-rows="2" grid-fill="row" space-between="24"></swiper-container>');
  
$container.attr('breakpoints', JSON.stringify({
  0: {
    slidesPerView: 2,
    spaceBetween: 16,
    grid: {
      rows: 1,
      fill: 'row'
    }
  },
  768: {
    slidesPerView: 4,
    spaceBetween: 24,
    grid: {
      rows: 2,
      fill: 'row'
    }
  }
}));

  $('.content-biencongty .main-posts').children().each(function () {
    const $slide = $('<swiper-slide></swiper-slide>');
    $slide.append($(this).clone());
    $container.append($slide);
  });

  $('.content-biencongty .main-posts').replaceWith($container);

  customElements.whenDefined('swiper-container').then(() => {
    const swiperEl = document.querySelector('.swiper-biencongty');
    const btnNext = document.querySelector('.custom-next-biencongty');
    const btnPrev = document.querySelector('.custom-prev-biencongty');

    function updateNavButtons(swiper) {
      if (swiper.isBeginning) {
        btnPrev.setAttribute('disabled', 'true');
      } else {
        btnPrev.removeAttribute('disabled');
      }

      if (swiper.isEnd) {
        btnNext.setAttribute('disabled', 'true');
      } else {
        btnNext.removeAttribute('disabled');
      }
    }

    function bindCustomButtons() {
      const swiper = swiperEl.swiper;
      if (!swiper) {
        setTimeout(bindCustomButtons, 100);
        return;
      }

      // Gắn sự kiện click
      btnNext.addEventListener('click', function () {
        swiper.slideNext();
      });
      btnPrev.addEventListener('click', function () {
        swiper.slidePrev();
      });

      // Cập nhật trạng thái khi khởi tạo và khi slide thay đổi
      swiper.on('slideChange', () => updateNavButtons(swiper));
      swiper.on('afterInit', () => updateNavButtons(swiper));

      // Gọi ban đầu
      updateNavButtons(swiper);
    }

    bindCustomButtons();
  });
});
</script>


<script>
	jQuery(document).ready( function($){
	$('.chitiet_sp .slide_sp ul:first-child').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		arrows: false,
		fade: true,
		asNavFor: '.chitiet_sp .slide_sp ul:last-child'
	});
	$('.chitiet_sp .slide_sp ul:last-child').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		infinite: true,
		asNavFor: '.chitiet_sp .slide_sp ul:first-child',
		dots: false,
		arrows: false,
		centerMode: false,
		focusOnSelect: true
	});	

	});

jQuery(document).ready(function($) {
  $(".content-news .main-posts").slick({
    arrows: false,
    infinite: true,
    dots: true,
    speed: 600,
    autoplay: false,
    autoplaySpeed: 6000,
    pauseOnHover: false,
    pauseOnFocus: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 801,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});


</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
  const scrollBtn = document.getElementById('scrool-top');

  window.addEventListener('scroll', function () {
    if (window.scrollY > 100) {
      scrollBtn.style.display = 'block';
    } else {
      scrollBtn.style.display = 'none';
    }
  });

  scrollBtn.addEventListener('click', function () {
    window.scrollTo({
      top: 0,
      behavior: 'smooth' // Cuộn mượt
    });
  });
});
</script>





<script>

	document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".content-thanhtuu ul li span");

  counters.forEach(counter => {
    const target = parseInt(counter.textContent.replace(/\D/g, "")); // Lấy số từ <em>
    counter.textContent = "0"; // Bắt đầu từ 0

    let count = 0;
    const speed = 30; // ms mỗi lần tăng
    const increment = Math.ceil(target / 100); // tăng từng bước nhỏ

    const updateCount = () => {
      count += increment;
      if (count >= target) {
        counter.textContent = target;
      } else {
        counter.textContent = count;
        setTimeout(updateCount, speed);
      }
    };

    updateCount();
  });
});

jQuery(document).ready(function($) {

	$('.site-header p').click(function() {
			$('.nhantuvan .widget_caldera_forms_widget').show();
	});

	$('.nhantuvan .widget_caldera_forms_widget .widgettitle').click(function() {
			$('.nhantuvan .widget_caldera_forms_widget').hide();
	});


  var youtube = document.querySelectorAll( ".youtube" );
      for (var i = 0; i < youtube.length; i++) {
          // thumbnail image source.
          var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/hqdefault.jpg"; 

          // Load the image asynchronously
          var image = new Image();
              image.src = source;
              image.addEventListener( "load", function() {
                  youtube[ i ].appendChild( image );
              }( i ) );

          youtube[i].addEventListener( "click", function() {

          var iframe = document.createElement( "iframe" );
   
              iframe.setAttribute( "frameborder", "0" );
              iframe.setAttribute( "allowfullscreen", "" );
              iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
   
              this.innerHTML = "";
              this.appendChild( iframe );
      } );
       
      }

  // câu hỏi

   var widgets = $('.list_ques .question');

			// Ẩn tất cả .textwidget và bỏ class active
			widgets.find('.answer').hide();
			widgets.find('.title').removeClass('active');

			// Mặc định hiện widget đầu tiên
			// widgets.first().find('.title').addClass('active');
			// widgets.first().find('.answer').show();

			// Bắt sự kiện click
			widgets.find('.title').click(function () {
			  var $title = $(this);
			  var $widget = $title.closest('.question');
			  var $textwidget = $widget.find('.answer');
			  var isActive = $title.hasClass('active');

			  // Ẩn tất cả và remove class
			$('.list_ques .question .answer').slideUp();
  	   $('.list_ques .question .title').removeClass('active');

			  // Nếu chưa active thì mở, còn đang mở thì đóng
			  if (!isActive) {
			    $textwidget.slideDown();
			    $title.addClass('active');
			  }
			});


  // quy trình

   var widgets = $('.list_buoc .buoc');

  // Ẩn tất cả .textwidget và bỏ class active
  widgets.find('.noidung').hide();
  widgets.find('.ten').removeClass('active');

  // Mặc định hiện widget đầu tiên
  // widgets.first().find('.ten').addClass('active');
  // widgets.first().find('.noidung').show();

  // Bắt sự kiện click
  widgets.find('.ten').click(function() {
    var $title = $(this);
    var $widget = $title.closest('.buoc');

    // Ẩn tất cả và remove class
    widgets.find('.noidung').slideUp();
    widgets.find('.ten').removeClass('active');

    // Hiện cái được click
    $widget.find('.noidung').slideDown();
    $title.addClass('active');
  });


  //


	$('').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: false,
		arrows: false,
		fade: true,
		asNavFor: ''
	});

	$('').slick({
	    slidesToShow: 2,
	    slidesToScroll: 1,
	    infinite: false,
	    asNavFor: '',
	    dots: false,
	    arrows: true,
	    centerMode: false, 
	    focusOnSelect: true
	});

	var nav = $('.nav-primary');
	var head =$('.site-header');
	var click =$('#click-menu');
	var menu = $('#responsive-menu');
	var close = $('#click-menu-close');
	var nhantuvan = $('.nhantuvan');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			nav.addClass("f-nav");
			head.addClass("f-head");
			click.addClass("f-click");
			menu.addClass("f-menu");
			close.addClass("f-close");
			nhantuvan.addClass("f-tuvan");

		} else {
			nav.removeClass("f-nav");
			head.removeClass("f-head");
			click.removeClass("f-click");
			menu.removeClass("f-menu");
			close.removeClass("f-close");
			nhantuvan.removeClass("f-tuvan");
		}
		
	});


// đại diện vn

if ($(window).width() > 960) {

	// const slider = document.querySelector('.content-doitac ul');
  // slider.innerHTML += slider.innerHTML; // Clone toàn bộ li

	// $(".content-doitac ul").slick({
	//   arrows: false,
  // infinite: true,
  // dots: false,
  // speed: 15000,             // chậm dần nhưng liên tục
  // cssEase: 'linear',
  // autoplay: true,
  // autoplaySpeed: 0,
  // pauseOnHover: false,
  // pauseOnFocus: false,
  // slidesToShow: 6,
  // slidesToScroll: 1,
  // variableWidth: true,
	// });


}else{

	

	$("").slick({
		arrows: false,
			infinite: true,
			dots: true,
			speed: 600,	
			autoplay: true,
			autoplaySpeed: 5000,	
			pauseOnHover: false,
			pauseOnFocus: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: false,
			variableWidth: false,
			dotsClass: 'custom_paging',
		    customPaging: function (slider, i) {
		        return '<span class="line"></span>';
		    },
	});	


}


$("").slick({
		arrows: true,
		infinite: true,
		dots: false,
		speed: 600,	
		autoplay: false,
		autoplaySpeed: 5000,	
		pauseOnHover: false,
		pauseOnFocus: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
			breakpoint: 961,
				settings: {
					slidesToShow: 4,
				}
			},
			{
			breakpoint: 769,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false,
					dots: true,
					dotsClass: 'custom_paging',
		    customPaging: function (slider, i) {
		        return '<span class="line"></span>';
		    },
				}
			}
		]
	});

	
	$('a[href*=\\#]:not([href=\\#])').click(function() {
		if (location.pathname.replace('/^\//','') == this.pathname.replace('/^\//','') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top-50
			}, 500);
			return false;
		  }
		}
	});	
});
</script>
<script>
jQuery(document).ready( function($){
	$(".content .comment-form #submit").click(function(){
		var comment_content = $(".content .comment-form #comment").val();
		if( !comment_content )
		{
			alert('Bạn chưa nhập nội dung bình luận!');
			return false;
		}else{
			$(".content .comment-form .popup-comment").fadeIn();
			return false;
		}
	});
	$(".content .comment-form .popup-comment .close-popup-comment").click(function(){
		$(".content .comment-form .popup-comment").fadeOut();
	});
	$("main.content #respond input#submit-commnent").click(function(){
		var comment_name = $(".content .comment-form #author").val();
		var comment_email = $(".content .comment-form #email").val();
		var comment_phone = $(".content .comment-form .comment-form-phone #author").val();
		if( !comment_name ){
			alert('Bạn chưa nhập họ và tên!');
			return false;
		}else if( !comment_email ){
			alert('Bạn chưa nhập email!');
			return false;
		}else if( !comment_phone ){
			alert('Bạn chưa nhập số điện thoại!');
			return false;
		}else{
			$(".content #commentform").submit();
			$(".content .comment-form .popup-comment").fadeOut();
		}
	});
});
</script>


<?php
}