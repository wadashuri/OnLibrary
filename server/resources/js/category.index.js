// ページの先頭へ移動する
$("#to-pagetop a").click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
});

//Ajax非同期通信いいね機能
$(function () {
    let like = $('.like-toggle');
    let likePostid;
    like.on('click', function () {
        let $this = $(this);
        likePostid = $this.data('post-id');

        //ajax処理スタート
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxfavorite',
                method: 'POST',
                data: {
                    'post_id': likePostid
                },
            })
            //通信失敗した時の処理
            .fail(function () {
                console.log('fail');
            });
    });
});
