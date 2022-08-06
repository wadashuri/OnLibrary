
const swiper = new Swiper(".swiper", {
  // ページネーションが必要なら追加
  pagination: {
    el: ".swiper-pagination"
  },
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "2",

  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true
  },

  // ナビボタンが必要なら追加
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});


jQuery(function() {
	let documentHeight = jQuery(document).height();
	let windowsHeight = jQuery(window).height();
	let postNumNow = 6; /* 最初に表示されている記事数 */
	let postNumAdd = 6; /* 追加する記事数 */
	let flag = false;
	jQuery(window).on("scroll", function() {
		let scrollPosition = windowsHeight + jQuery(window).scrollTop();
		if (scrollPosition >= documentHeight) {
			if (!flag) {
				flag = true;
				jQuery.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
					type: "POST",
					url: "/ajaxaddpost",
					data: {
						post_num_now: postNumNow,
						post_num_add: postNumAdd
					},
					success: function(response) {
						jQuery("#list").append(response);
						documentHeight = jQuery(document).height();
						postNumNow += postNumAdd;
						flag = false;
					}
				});
			}
		}
	});
});