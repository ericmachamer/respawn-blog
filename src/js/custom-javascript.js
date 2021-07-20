// Add your JS customizations here
var $ = jQuery.noConflict();
$(function(){
  // $('.pagination').on('click', 'a.page-link', function(e) {
  //   e.preventDefault();
  //   let page = $(this).text(),
  //       currentPage = $('.page-item.active').find('span').text(),
  //       currentPageReplace = '<a class="page-link" href="/page/'+currentPage+'/">'+currentPage+'</a>',
  //       clickPageReplace = '<span aria-current="page" class="page-link current">'+page+'</span>';
  //   $('.page-item.active').removeClass('active').html(currentPageReplace);
  //   $(this).closest('.page-item').html(clickPageReplace).addClass('active');
  //   paginatePosts(page);
  // });
  // window.onpopstate = function(e){
  //   if(e.state){
  //       document.getElementById("main").innerHTML = e.state.html;
  //       document.title = e.state.pageTitle;
  //   }
  // };
})

function paginatePosts(page){
  // Start the transition
  $("#main").html('');
  $("#loading").addClass('d-flex').removeClass('d-none');
  $("#main ").addClass('d-none');

  // Data to receive from our server
  // the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 
  var data = {
      page: page,
      action: "pagination-load-posts"
  };

  // Send the data
  $.post(ajax.ajax_url, data, function(response) {
      // If successful Append the data into our html container
      $("#main").html(response);
      // End the transition
      $(".cvf_pag_loading").css({'background':'none', 'transition':'all 1s ease-out'});
  }).done(function(response) {
    var title = $(document).attr('title');
    $("#loading").removeClass('d-flex').addClass('d-none');
    $("#main ").removeClass('d-none');
    window.history.pushState({"html":response,"pageTitle":title},"", '/page/'+page);
  });
}