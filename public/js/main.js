// window.setTimeout(function() {
//     $("#alert-out").fadeTo(500, 0).slideUp(500, function(){
//         $(this).remove();
//     });
// }, 2000);
//
// function makeAjaxCall(url, form, callback){
//    $.ajax({
//        type: "post",
//        url: url,
//        cache: false,
//        data: $(form).serialize(),
//        success: function(json){
//          var obj = jQuery.parseJSON(json);
//          $(callback).html(
//            '<div class="alert alert-'+obj['STATUS']+'" id="alert-out">'+obj['MESSAGE']+'</div>'
//          );
//          location.reload(true);
//        }
//    });
// }
//
// function makeAjaxCallNotify(url,form){
//    $.ajax({
//        type: "post",
//        url: url,
//        cache: false,
//        data: $(form).serialize(),
//        success: function(json){
//          var obj = jQuery.parseJSON(json);
//          $.notify(obj['MESSAGE'],obj['STATUS']);
//          location.reload(true);
//        }
//    });
// }
//
// $(document).click(function(e) {
// if (!$(e.target).is('a')) {
//     $('.collapse').collapse('hide');
//   }
// });
//
// // Checkall Function for checkbox
// function checkall(source,name) {
//   checkboxes = document.getElementsByName(name);
//   for(var i=0, n=checkboxes.length;i<n;i++) {
//     checkboxes[i].checked = source.checked;
//   }
// }
