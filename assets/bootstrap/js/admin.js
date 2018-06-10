// bila a diklik
$(".menu li > a").click(function(e){
  // slideUp dan slideDown apabila mempunyai anak menu
  $(".menu ul .submenu").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),e.stopPropagation()
})
