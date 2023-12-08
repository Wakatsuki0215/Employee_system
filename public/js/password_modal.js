  jQuery(document).ready(function($){
    // ボタンをクリックしたらモーダル画面に遷移
    $(".modal-open").click(function () {


        // リストの社員情報を取得する。


        // 入力画面
        $(".modal").fadeIn();
        // 背景
        $(".overlay").fadeIn();
    });


    // 入力画面の閉じるボタンか入力外の部分をクリックすると戻る
    $(".close, .overlay").click(function () {
        // 入力画面と背景を閉じる
        $(".modal").fadeOut();
        $(".overlay").fadeOut();
    });
});