$().ready(function(){
    counter = $('.counter');
    if (counter.text() > 0) {
        counter.show();
    } else {
        $('[onclick*="addCart"]').click(function () {
            $(".counter").show();
        });
    }
    $(".close").click(function(){
        addCat = $('.add-category');
        addCat.addClass('animated fadeOut');
        addCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            addCat.hide();
            addCat.removeClass('animated fadeOut');
        });
        $('#show-cat').show();
    })
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

function signIn(eID, pID) {
    email = $('#' + eID).val();
    password = $('#' + pID).val();

    var formData = {email:email, password:password}; //Array
    console.log(formData);
    $.post({
        url : "loginUser.php",
        data : formData,
    }).done(function(data) { // success method
        $('#alert-warning').val(data);
        console.log(data);
    }).fail(function(data) { // fail method
        // fail stuff
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


function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    fullName = profile.getName();
    console.log('Full Name: ' + fullName);
    firstName = profile.getGivenName();
    console.log('Given Name: ' + firstName);
    lastName = profile.getFamilyName();
    console.log('Family Name: ' + lastName);
    pic = profile.getImageUrl();
    console.log("Image URL: " + pic);
    email = profile.getEmail();
    console.log("Email: " + email);

    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    var formData = {action:"google", token:id_token, fullName:fullName, firstName:firstName, lastName:lastName, pic:pic, email:email}; //Array

    $.post({
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        $('#alert-warning').text(data);
        console.log(data);
    }).fail(function(data) { // fail method
        $('#alert-warning').text('ajax fail catch=' + data);
    });
}

function showAddCategory() {
    showCat = $('#show-cat');
    addCat = $('.add-category')
    showCat.addClass('animated fadeOut');
    showCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        showCat.hide();
        showCat.removeClass('animated fadeOut');
    });
    showCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        showCat.hide();
        showCat.removeClass('animated fadeOut');
    });

    addCat.addClass('animated fadeIn');
    addCat.show();
    addCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        addCat.removeClass('animated fadeOut');
    });

}

$("#avatar-1").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="fa fa-folder-open"></i>',
    removeIcon: '<i class="fa fa-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="../img/so3-albel-nox.jpg" alt="Your Avatar" style="width:160px">',
    layoutTemplates: {main2: '{preview} {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
