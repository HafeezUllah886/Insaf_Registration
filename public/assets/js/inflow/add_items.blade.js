
$(document).ready(function(){
var selectized = $('#normalize').selectize();
/* selectized[0].selectize.focus(); */
get_items();
});

$('#add_btn').on('click', function(){
var product = $('#normalize').find(":selected").val();
var qty = $('#qty').val();
var price = $('#price').val();
var id = $('#id').val();
$('#product_msg').html('');
$('#qty_msg').html('');
$('#price_msg').html('');
if(product == ''){
 $('#product_msg').html('Please Select Product');
 return false;
}
if(qty == ''){
 $('#qty_msg').html('Enter Quantity');
 return false;
}
if(price == ''){
 $('#price_msg').html('Enter Purchase Price');
 return false;
}

$.ajax({
method: "get",
url: "/inflow/add_pro/"+id+"/"+product+"/"+qty+"/"+price,
success: function(result){
 if(result == 'exists'){
     var msg = "Product Already Exists";
     Snackbar.show({
     text: msg,
     duration: 3000,
     actionTextColor: '#fff',
     backgroundColor: '#e7515a'
     });
 }
 else{
     get_items();
 }
}
});
});

function get_items(){
var id = $('#id').val();
$.ajax({
method: "get",
url: "inflow/get_items/"+id,
success: function(result){

 $("#items").html(result);
}
});
}

