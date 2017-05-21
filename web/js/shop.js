/**
 * Created by subsp on 5/20/2017.
 */

getData();

function getData(cat = ""){
    category = cat;
    outputHTML = "";
    formData = {"category":category};
    $.post({ // built in post
        url : "accessDatabase.php",
        data : formData,
        dataType : "html"
    }).done(function(data) { // success method
        console.log(data);
        dbdata = JSON.parse(data);
        console.log(dbdata.toString());
        for(i = 0; i < dbdata.length; i++) {
            if (category === "" || dbdata[i].category !== category) {
                category = dbdata[i].category;
                outputHTML += "<h3>"+ category +"</h3>";
            }
            outputHTML += '<ul class="list-unstyled card p-3"> <li class="media"> <img class="d-flex mr-3 hoverable" src="https://placehold.it/400x400?text=IMAGE" alt="';
            outputHTML += dbdata[i].name + '"><div class="media-body"> <ul> <li><h5>';
            outputHTML += dbdata[i].name + '</h5></li><li>' + dbdata[i].description + '</li><li><br></li><li class="d-flex flex-row-reverse"><h5 class="px-2"><strong><span>$';
            outputHTML += dbdata[i].cost + '</span></strong></h5></li><li></li> <li> <div class="d-flex flex-row-reverse btn-group"> <button class="waves-effect btn pink lighten-4" onclick="addCart(\'';
            outputHTML += dbdata[i].name + '\',\'' + dbdata[i].cost + '\', \'...\', \'' + dbdata[i].itmnum + '\');" type="button">Add to Cart</button></div> </li> </ul> </div> </li> </ul>'
        }

        $('.shop-list').html(outputHTML);
    }).fail(function(data) { // fail method
        // fail stuff
    }).always(function(data) { // always runs, success or fail
        console.log('always');
    });
}



function setCategory(category) {
    getData(category);
}

