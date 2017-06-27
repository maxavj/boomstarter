document.getElementsByName('keys')[0].placeholder='Название проекта';
(function ($) {

      $( "#buttonvid" ).on( "click", function() {
        $(".videocon").css("filter", "none").css("z-index", "999").css("width", "60%").get(0).play();
          $(".podvideo, #buttonvid, .first-region p:nth-child(1), .first-region p:nth-child(2)").css("visibility", "hidden");
          $(".first-region p:nth-child(3)").addClass('clicked');

});
      $("#butt_share").on("click", function() {
        $(".fifteen-region .views-field-field-social, .seventeen-region .views-field-field-social").css("display", "block");
      });
      $("a[href='#']").removeAttr("href");


      

})(jQuery);