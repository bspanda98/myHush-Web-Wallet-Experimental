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
//http://chart.apis.google.com/chart?cht=qr&chs=250x250&chl=test&chld=H|0
  $('#modal-address-qr').attr("src", "http://chart.apis.google.com/chart?cht=qr&chs=250x250&chl="+result.address+"&chld=H|0");
  $('.modal-address-text').empty().append(result.address);
  $('#address-modal').modal('toggle');

});
});

});
