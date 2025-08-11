<?php

// Thêm file jquery
add_action('wp_footer', 'caia_add_file_jquery');
function caia_add_file_jquery(){
?>
<script>
  document.getElementById('video-thumbnail').addEventListener('click', function () {
    this.classList.add('is-playing');
    this.innerHTML = `
      <iframe width="100%" height="380px"
        src="https://www.youtube.com/embed/30fxjibK2IY?autoplay=1"
        title="YouTube video player"
        frameborder="0"
        allow="autoplay; encrypted-media"
        allowfullscreen>
      </iframe>
    `;
  });
</script>

<script>
jQuery(document).ready(function ($) {
  $('.content-tienich ul:first-child').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    fade: true,
    autoplay: true,
    autoplaySpeed: 4000,
    asNavFor: '.content-tienich ul:last-child'
  });

  $('.content-tienich ul:last-child').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: true,
    asNavFor: '.content-tienich ul:first-child',
    dots: false,
    arrows: false,
    centerMode: false,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4
        }
      }
    ]
  });


  	$(".content-sanpham .main-posts").slick({      
		arrows: false,
		infinite: false,
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
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			}
		]
	});


  
  	$(".content-news .main-posts").slick({      
		arrows: false,
		infinite: true,
		dots: true,
		speed: 600,	
		autoplay: false,
		autoplaySpeed: 6000,	
		pauseOnHover: false,
		pauseOnFocus: false,
		slidesToShow: 3,
		slidesToScroll: 3,
    
		responsive: [
			{
			breakpoint: 801,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}
		]
	});



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


// 

// Hàm khởi tạo/hủy slider tùy kích thước màn hình
jQuery(document).ready(function($) {
    var $wrap = $(".content-moban2 .wrap");
    var $lastItem = $wrap.find("section:last-child");
    var movedItem = null;

    function initSlickSlider(selector, mobileSettings) {
        var $slider = $(selector);

        if ($(window).width() < 768) {
            // Trường hợp riêng cho .content-moban2
            if ($slider.is($wrap) && movedItem === null) {
                movedItem = $wrap.find("section:last-child").detach();
                $(".content-moban2").append(movedItem);
            }
            if (!$slider.hasClass('slick-initialized')) {
                $slider.slick(mobileSettings);
            }
        } else {
            // PC
            if ($slider.hasClass('slick-initialized')) {
                $slider.slick('unslick');
            }
            if ($slider.is($wrap) && movedItem) {
                $wrap.append(movedItem); // trả về cuối wrap như ban đầu
                movedItem = null;
            }
        }
    }

    var slidersConfig = [
        {
            selector: ".content-tongquan section:nth-child(3) .textwidget",
            settings: { arrows:false, infinite:false, dots:true, speed:600, autoplay:false, slidesToShow:1, slidesToScroll:1 }
        },
        {
            selector: ".yarpp-related .main-posts",
            settings: { arrows:false, infinite:false, dots:true, speed:600, autoplay:false, slidesToShow:1, slidesToScroll:1 }
        },
        {
            selector: ".taxonomy-products",
            settings: { arrows:false, infinite:false, dots:true, speed:600, autoplay:false, slidesToShow:2, slidesToScroll:2 }
        },
        {
            selector: ".content-moban2 .wrap",
            settings: { arrows:false, infinite:false, dots:true, speed:600, autoplay:false, slidesToShow:1, slidesToScroll:1 }
        }
    ];

    function runAllSliders() {
        slidersConfig.forEach(function(slider) {
            initSlickSlider(slider.selector, slider.settings);
        });
    }

    runAllSliders();
    $(window).on('resize', runAllSliders);
});


});
</script>


<script>
  jQuery(document).ready( function($){
  //  	$('.site-header .widget_search .widgettitle').on('click', function() {
  //     $(this).toggleClass('active');
  //     $(this).parent().find('.search-form').toggleClass('active');
  //   }
  // )
  

      $(window).on('scroll', function() {
      if ($(window).scrollTop() > 80) {
        $('.site-header').addClass('scrolled');
        $('.site-header .menu a').addClass('scrolled');
        // $('.search-form input[type="search"]').addClass('scrolled');
      } else {
        $('.site-header').removeClass('scrolled');
        // $('.site-header .menu a').removeClass('scrolled');
        // $('.search-form input[type="search"]').removeClass('scrolled');
      }
    });


$(document).on('click', '#responsive-menu a[href^="#"]', function(e) {
    e.preventDefault();
    const target = $($(this).attr('href'));

    if (target.length) {
        // Đóng menu + đổi icon về ban đầu
        $("#responsive-menu").removeClass('open');
        $("#click-menu").removeClass('change');

        // Scroll tới vị trí
        $('html, body').animate({
            scrollTop: target.offset().top - 100
        }, 600);
    }
});


  $('.site-header .menu a[href^="#"]').on('click', function(e){
    e.preventDefault();
    const target = $($(this).attr('href'));
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - 100
      }, 600);
    }
  });


      $('.before_footer .menu a[href^="#"]').on('click', function(e){
    e.preventDefault();
    const target = $($(this).attr('href'));
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - 100
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


</script>

<!-- Trang theo catergory -->

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