$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'php/ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            var myJSONText = JSON.stringify(response);
            $("#results").html(myJSONText);
        });
    });

});
