$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = 'http://localhost/sweet_shop/public/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '70%',
        height: '75%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    console.log(filePath);
    $('#' + requestingField).val(filePath);
    $('#cboxClose').click();
}
