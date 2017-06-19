document.getElementsByName('keys')[0].placeholder='Название проекта';
(function ($, Drupal) {

  $(document).ready(function () {
      if(!$('body').hasClass('user-logged-in')) {
    $('body').addClass('user-not-logged-in');
  }
});

})(jQuery, Drupal);