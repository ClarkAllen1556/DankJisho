$(function() {

  $("#NewPost").submit(function(){
	var values = $("NewPost").serialize();
    var comment = $("#comment").val();
    console.log(values);
    $.ajax({
      type: "POST",
      url: "comment_handler.php",
      data: values,
      success: function() {
        $('#comments tbody').prepend("<tr><td>" +
          comment + "</td><td>Just now</td></tr>");
        $('#comment').val('');
      },
      error: function () {
        alert("FAILURE");
      }
    });
    return false;
  });

});