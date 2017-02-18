jQuery(document).ready(function($) {

$('#generate-address').click(function(){
  var label = $('#label').val();
  var token = $("input[name=_token]").val();

  $.post("/dashboard/addresses/new", {label: label, _token: token}, function(result) {
    if(typeof result.label === "undefined") {
  $('#addresses-table').find("tbody").prepend("<tr><td>"+result.updated_at+"</td><td>"+result.address+"</td><td></td></tr>").hide().fadeIn("slow");
} else {
    $('#addresses-table').find("tbody").prepend("<tr><td>"+result.updated_at+"</td><td>"+result.address+"</td><td>"+result.label+"</td></tr>").hide().fadeIn("slow");
};
});
});

});
