// Fonctions Florent
jQuery(document).ready(function () {
  $ = jQuery;

  // Décodage des @ mails
  $("a[data-email]").each(function () {
    this.href =
      "mailto:" +
      $(this)
        .attr("data-email")
        .replace("[at]", "@")
        .replace(/\[dot]/g, ".");

    if ($(this).hasClass("full")) {
      this.innerHTML = this.href.replace("mailto:", "");
    }
  });
});
