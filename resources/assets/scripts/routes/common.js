export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $(`#btn-toggle-nav-menu`).click(() => {
      $(`#nav-menu-wrapper`).toggleClass(`hidden`);
    });
    $(window).scroll(() => {
      const headerSelector = `#nav-header`;
      const shadowClass = `shadow-lg lg:shadow-none`;
      if (window.scrollY > 10) {
        $(headerSelector).addClass(shadowClass);
      } else {
        $(headerSelector).removeClass(shadowClass);
      }
    });
  },
};
