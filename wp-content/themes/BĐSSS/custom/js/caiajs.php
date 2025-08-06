<?php

// Thêm file jquery
add_action('wp_footer', 'caia_add_file_jquery');
function caia_add_file_jquery(){
?>

<!-- <script>
jQuery(document).ready(function ($) {
  const $container = $('<swiper-container class="mySwiper"></swiper-container>')[0]; // DOM element thuần

  // Gán các thuộc tính cho hiệu ứng coverflow
  $container.pagination = true;
  $container.effect = 'coverflow';
  $container.grabCursor = true;
  $container.centeredSlides = true;
  $container.slidesPerView = 'auto';

  $container.coverflowEffect = {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true
  };

  $container.autoplay = {
    delay: 3000,
    pauseOnMouseEnter: true,
    disableOnInteraction: false
  };

  $container.speed = 800;

  // Tạo các swiper-slide từ <li>
  $('.content-background .textwidget ul').children().each(function () {
    const slide = document.createElement('swiper-slide');
    slide.appendChild(this.cloneNode(true));
    $container.appendChild(slide);
  });

  // Thay thế <ul> bằng swiper
  $('.content-background .textwidget ul').replaceWith($container);

  // Xử lý custom buttons sau khi swiper khởi tạo
  customElements.whenDefined('swiper-container').then(() => {
    const swiperEl = document.querySelector('.mySwiper');
    const btnNext = document.querySelector('.custom-next-biencongty');
    const btnPrev = document.querySelector('.custom-prev-biencongty');

    function updateNavButtons(swiper) {
      if (swiper.isBeginning) {
        btnPrev?.setAttribute('disabled', 'true');
      } else {
        btnPrev?.removeAttribute('disabled');
      }

      if (swiper.isEnd) {
        btnNext?.setAttribute('disabled', 'true');
      } else {
        btnNext?.removeAttribute('disabled');
      }
    }

    function bindCustomButtons() {
      const swiper = swiperEl.swiper;
      if (!swiper) {
        setTimeout(bindCustomButtons, 100);
        return;
      }

      btnNext?.addEventListener('click', () => swiper.slideNext());
      btnPrev?.addEventListener('click', () => swiper.slidePrev());

      swiper.on('slideChange', () => updateNavButtons(swiper));
      swiper.on('afterInit', () => updateNavButtons(swiper));

      updateNavButtons(swiper);
    }

    bindCustomButtons();
  });
});
</script> -->


<!-- <script>
  jQuery(document).ready(function($) {
  $(".content-background .textwidget ul").slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 1,
    arrows: false,
    infinite: true,
    dots: true,
    speed: 600,
    autoplay: false,
    autoplaySpeed: 6000,
    pauseOnHover: false,
    pauseOnFocus: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });
});

</script> -->


<script>
  jQuery(document).ready( function($){
  //  	$('.site-header .widget_search .widgettitle').on('click', function() {
  //     $(this).toggleClass('active');
  //     $(this).parent().find('.search-form').toggleClass('active');
  //   }
  // )

  //     $(window).on('scroll', function() {
  //     if ($(window).scrollTop() > 80) {
  //       $('.site-header').addClass('scrolled');
  //       $('.site-header .menu a').addClass('scrolled');
  //       $('.search-form input[type="search"]').addClass('scrolled');
  //     } else {
  //       $('.site-header').removeClass('scrolled');
  //       $('.site-header .menu a').removeClass('scrolled');
  //       $('.search-form input[type="search"]').removeClass('scrolled');
  //     }
  //   });


    $('.site-header .menu a[href^="#"]').on('click', function(e){
    e.preventDefault();
    const target = $($(this).attr('href'));
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - 80
      }, 600);
    }
  });



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

	// $('.site-header .textwidget p').click(function() {
	// 		$('.nhantuvan .widget_caldera_forms_widget').fadeIn();
	// });

	// $('.nhantuvan .widget_caldera_forms_widget .widgettitle').click(function() {
	// 		$('.nhantuvan .widget_caldera_forms_widget').fadeOut();
    	
	// });
}
)


// jQuery(document).ready(function($) {
//   $('.nhanbaogia span').click(function() {
//     $('.nhantuvan').fadeIn();
//     $('.nhantuvan .widget_caldera_forms_widget').fadeIn();
//   });

//   $('.nhantuvan .close-popup').click(function() {
//     $('.nhantuvan').fadeOut();
//   });
// });



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