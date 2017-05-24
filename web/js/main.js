$().ready(function(){
    if ($('.counter').text() > 0) {
        $('.counter').show();
    } else {
        $('[onclick*="addCart"]').click(function () {
            $(".counter").show();
        });
    }
});


var cartCount = "0";

function addCart(itemName, itemPrice, itemPic, itemNum) { 
    var formData = {itemName:itemName,itemPrice:itemPrice,itemPic:itemPic, itemNum:itemNum, itemQty:1}; //Array 
 
    $.post({ // built in post
    	url : "addToCart.php",
      	data : formData,
    }).done(function(data) { // success method
        cartCount = data;
    	$('#counter').html(cartCount);
    }).fail(function(data) { // fail method
    	// fail stuff
    }).always(function(data) { // always runs, success or fail
        console.log('always');
    });
}

var total = "0.00";
function removeCart(itemNum) {
    var formData = {itemNum:itemNum};
     $('#' + itemNum).hide();
    
    $.post({ // built in post
    	url : "removeFromCart.php",
      	data : formData,
    }).done(function(data) { // success method
        total = data;
    	$('#cartTotal').html(total);
    }).fail(function(data) { // fail method
    	// fail stuff
    }).always(function(data) { // always runs, success or fail
        console.log('always');
    });
}

function signup(userInput, passInput) {
    username = $('#' + userInput).val();
    password = $('#' + passInput).val();

    var formData = {username:username, password:password}; //Array
    console.log(formData);
    $.post({
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        $('#' + userInput).val(data);
        console.log(data);
    }).fail(function(data) { // fail method
        // fail stuff
    });
}