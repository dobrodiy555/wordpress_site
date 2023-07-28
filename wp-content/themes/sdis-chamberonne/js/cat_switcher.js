jQuery(document).ready(function($) {
// alarmes-divers switcher
  $('.link.btn').click(function(e) {
    e.preventDefault();
    let type = $(this).text();
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    $('.table-list').empty();
    let nonce = sdis.security;
    $.ajax({
      type: "post",
      url: sdis.ajaxurl,
      data: { action: 'switch', type: type, security: nonce },
      success: function(resp) {
        // alert(resp);
        $('.table-list').append(resp);
      },
      error: function(error) {
        alert("Error during ajax" + error);
      }
    })
  })

  // cats switcher
  $('.cas-click').click(function (e) {
    e.preventDefault();
    let cat = $(this).text();
    cat = cat.replace(/\s/g, ''); // remove spaces
    // cat = cat.charAt(0).toLowerCase() + cat.slice(1);
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    $('.block-posts.flex').empty();
    $.ajax({
      method: "post",
      url: sdis.ajaxurl,
      data: {action: 'switch1', cat: cat, security: sdis.security}
    }).done(function(resp) {
        // alert(resp);
        $('.block-posts.flex').append(resp);
    })
      .fail(function(err) {
         alert("Error during ajax" + err);
      })
  });

  // to make 'Alarmes' red text a link in Arhives block
  $('.sdis-alarmes-link').each(function () {
    var href = $(this).next().attr('href');
    $(this).attr('href', href);
  });

});