document.getElementsByName('keys')[0].placeholder='Название проекта';
(function ($) {

      $( "#buttonvid" ).on( "click", function() {
        $(".videocon").css("filter", "none").css("z-index", "999").css("width", "60%").get(0).play();
          $(".podvideo, #buttonvid, .first-region p:nth-child(1), .first-region p:nth-child(2)").css("visibility", "hidden");
          $(".first-region p:nth-child(3)").addClass('clicked');

});

            $( ".path-start #buttonvid" ).on( "click", function() {
        $(".videocon").css("display", "block").css("z-index", "9").css("width", "60%").get(0).play();
          $(".podvideo, #buttonvid, .first-region p:nth-child(1), .first-region p:nth-child(2)").css("visibility", "hidden");
          $(".first-region p:nth-child(3)").addClass('clicked');
          $(".video-region .field--name-body p:nth-child(2)").css("background", "#fff");

});
      $("#butt_share").on("click", function() {
        $(".fifteen-region .views-field-field-social, .seventeen-region .views-field-field-social").css("display", "block");
      });
      $("a[href='#']").removeAttr("href");

      $(".left-region h5, .right-region h5").on("click", function() {
        if ($(this).hasClass("q-clicked")) {
          $(this).next().css("display", "none");
          $(this).removeClass("q-clicked");
        } else {
          $(this).next().css("display", "block");
          $(this).addClass("q-clicked");
        };

      });
      

})(jQuery);