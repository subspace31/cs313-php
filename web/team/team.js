function addLink(bID, cID, vID, conID, tID) {
    book = $('#' + bID).val();
    chapter = $('#' + cID).val();
    verse = $('#' + vID).val();
    content = $('#' + conID).val();
    topic = $('#' + tID).val();

    formData = {book:book, chapter:chapter, verse:verse, content:content, topic:topic}
    $.post({
        url: "insertTopic.php",
        data: formData,
    }).done(function (data) { // success method
        console.log(data);
    }).fail(function (data) { // fail method
        // fail stuff
        console.log("failed.")
    });
}