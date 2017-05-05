$(document).ready(function(){
    $("button").click(function(){
        $(".counter").show();
    });
});

var cartCount = 0;

function addCart(itemName, itemPrice, itemPic, itemNum) {
    cartCount++;
    document.getElementById("counter").innerHTML = cartCount.toString();
    
    var formData = {itemName:itemName,itemPrice:itemPrice,itemPic:itemPic, itemNum:itemNum}; //Array 
 
    $.ajax({
        url : "addToCart.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            //data - response from server
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

        }
    });
    
}