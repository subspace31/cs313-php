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
    });
    $('#signup-pass2').blur(function() {
        validatePassword();
    });
    $('input[name="address"]').click(function() {
        form = $('#newAddress');
        if($('#new').is(':checked')) {
            form.addClass('animated fadeIn');
            form.show();
            form.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                form.removeClass('animated fadeIn');
            });
        } else {
            form.hide();
            $('#hidden-id').val($('input[name=address]:checked').val());
        }
    });
});


var cartCount = "0";

function addCart(itemName, itemPrice, itemPic, itemNum) {
    var formData = {itemName:itemName,itemPrice:itemPrice,itemPic:itemPic, itemNum:itemNum, itemQty:1}; //Array 

    $.post({ // built in post
        url : "addToCart.php",
        data : formData,
    }).done(function(data) { // success method
        $('#counter').text(data);
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
        $('#cartTotal').html(data);
    }).fail(function(data) { // fail method
        // fail stuff
    });
}

function logout(loc){
    formData = {action:'logout'};
    $.post({ // built in post
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        window.location.reload();
    });
}

function signIn(eID, pID) {
    emailInput = $('#' + eID);
    passwordInput = $('#' + pID);
    password = passwordInput.val();
    email = emailInput.val();

    var formData = {action:"login", email:email, password:password}; //Array
    $.post({
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        switch (data) {
            case '0':
                window.location.reload();
                break;
            case '1':
                passwordInput.addClass('invalid').removeClass('valid');
                emailInput.addClass('invalid').removeClass('valid');
                $('[for="'+pID+'"]').attr('data-error', 'Username and/or password incorrect');
                break;
            case '2':
                break;
        }
    }).fail(function(data) { // fail method
        console.log('fail');
    });
}

function signInCreator(eID, pID) {
    emailInput = $('#' + eID);
    passwordInput = $('#' + pID);
    password = passwordInput.val();
    console.log(password);
    email = emailInput.val();

    var formData = {action:"loginC", email:email, password:password}; //Array
    $.post({
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        console.log(data);
        switch (data) {
            case '0':
                window.location.reload();
                break;
            case '1':
                passwordInput.addClass('invalid').removeClass('valid');
                emailInput.addClass('invalid').removeClass('valid');
                $('[for="'+pID+'"]').attr('data-error', 'Username and/or password incorrect');
                break;
            case '2':
                break;
        }
    }).fail(function(data) { // fail method
        console.log('fail');
    });
}

function signup(eID, pID) {
    emailInput = $('#' + eID);
    passwordInput = $('#' + pID);
    password = passwordInput.val();
    email = emailInput.val();

    var formData = {email:email, password:password, action:'create'}; //Array
    console.log(formData);
    $.post({
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        switch (data) {
            case '0':
                window.location.href = 'addListing.php';
                break;
            case '1':
                emailInput.addClass('invalid').removeClass('valid');
                $('[for="'+eID+'"]').attr('data-error', 'Email already registered');
                break;
            case '2':
                break;
        }
    }).fail(function(data) { // fail method
        // fail stuff
    });
}

function signupC(eID, pID) {
    emailInput = $('#' + eID);
    passwordInput = $('#' + pID);
    password = passwordInput.val();
    email = emailInput.val();

    var formData = {email:email, password:password, action:'createC'}; //Array
    console.log(formData);
    $.post({
        url : "createUser.php",
        data : formData,
    }).done(function(data) { // success method
        switch (data) {
            case '0':
                window.location.href = 'addListing.php';
                break;
            case '1':
                emailInput.addClass('invalid').removeClass('valid');
                $('[for="'+eID+'"]').attr('data-error', 'Email already registered');
                break;
            case '2':
                break;
        }
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
    addCat = $('.add-category');
    showCat.addClass('animated fadeOutRight');
    showCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        showCat.hide();
        showCat.removeClass('animated fadeOut');
    });
    showCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        showCat.hide();
        showCat.removeClass('animated fadeOutRight');
    });

    addCat.addClass('animated fadeInDown');
    addCat.show();
    addCat.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        addCat.removeClass('animated fadeInDown');
    });
}

function addItem(nID, cosID, dID, catID) {
    nameI = $('#' + nID);
    name = nameI.val();
    costI = $('#' + cosID);
    cost = costI.val();
    descI = $('#' + dID);
    desc = descI.val();
    catI = $('#' + catID);
    cat = catI.val();

    go = true;

    if (name === "") {
        go = false;
        nameI.addClass('invalid').removeClass('valid');
    }
    if (cost === "") {
        go = false;
        costI.addClass('invalid').removeClass('valid');
    }
    if (desc === "") {
        go = false;
        descI.addClass('invalid').removeClass('valid');
    }
    if (cat === "") {
        go = false;
    }

    if (go) {
        formData = {name: name, cost: cost, desc: desc, cat: cat};

        $.post({
            url: 'insertItem.php',
            data: formData,
        }).done(function (data) { // success method
            $('#modal-text').text(data);
            if (data === 'Item Added') {
                nameI.val("");
                costI.val("");
                descI.val("");
            }
            $('#frameModalBottom').modal('toggle');
        }).fail(function (data) { // fail method
            $('#modal-text').text('ajax fail data= ' + data);
            $('#frameModalBottom').modal('show');
        });
    } else {
        console.log(name + ' ' + cost + ' ' + desc);
    }
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

//validate inputs
function validatePassword() {
    pass1 = $('#signup-pass');
    pass2 = $('#signup-pass2');
    if (pass1.val() !== pass2.val() ) {
        pass1.addClass('invalid').removeClass('valid');
        pass2.addClass('invalid').removeClass('valid');
    }
}

$("#insertItemForm").submit(function (e) {
    e.preventDefault();

    addItem('name', 'cost', 'desc', 'cat');
});

function checkout() {
    if ($('#new').checked) {
        formData = $('#newAddress').serialize();
        $.post({
            url: 'addAddress.php',
            data: formData,
        }).done(function (data) {
            $('#hidden-id').val(data);
        });
    }
    $('#hidden-form').submit();
}

function confirmDelete(id) {
    $("#confirm-modal").modal("show");
    $('#confirm-delete').attr('onclick', 'deleleteItem('+id+')');
}

function deleteItem(id) {
    formData = {id:id, action:"delete"};
    $.post({
        url: 'insertItem.php',
        data: formData
    }).done(function(data) {
        $('#info-modal-text').text('Listing Deleted');
        $("#info-modal").modal("show");
    });

}

function editItem(id) {
    $('#update-id').val(id);
    $('#update-name').val($('#old-name').text());
    $('#update-desc').val($('#old-desc').text());
    $('#update-cost').val($('#old-cost').text());
    $('#update-cat').val($('#old-cat').data("cat"));
    $('#update-listing').modal('show');
}

function getCatData(cat = ""){
    category = cat;
    outputHTML = "";
    formData = {category:category};
    $.post({
        url : "accessDatabase.php",
        data : formData,
        dataType : "html"
    }).done(function(data) { // success method
        console.log(data);
        dbdata = JSON.parse(data);
        for(i = 0; i < dbdata.length; i++) {
            if (category === "" || dbdata[i].category !== category) {
                category = dbdata[i].category;
                outputHTML += "<h3>"+ category +"</h3>";
            }
            outputHTML += '<ul class="list-unstyled card p-3"><li class="media"><img class="mr-3 hoverable" src="https://placehold.it/400x400?text=IMAGE" alt=""><div class="media-body row"><ul class="col-8"><li><b>Name:</b> <span id="old-name">'
                + dbdata[i]['name'] + '</span></li><li><b>Description:</b> <span id="old-desc">'
                +  dbdata[i]['description'] + '</span></li><li><b>Cost:</b> $<span id="old-cost">'
                + dbdata[i]['cost'] + '</span></li><li><b>Category:</b> <span id="old-cat" data-cat="'
                + dbdata[i]['category_id']+'">'+ dbdata[i]['category'] + '</span></li> </ul><div class="col-4 btn-group mb-auto"><a class="btn pink lighten-4" onclick="editItem(\''
                +dbdata[i]['item_id']+'\')"><i class="fa fa-pencil left"></i> Edit</a><a class="btn pink lighten-4" onclick="deleteItem(\''
                + dbdata[i]['item_id']+'\')"><i class="fa fa-close left"></i> Delete</a></div></div></li></ul>';
        }
        $('.shop-list').html(outputHTML);
    }).fail(function(data) { // fail method
        // fail stuff
    });
}