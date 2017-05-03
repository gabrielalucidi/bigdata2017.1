$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var neighborhood = $('select[name=neighborhoods]').val();
        var ajaxurl = 'php/ajax.php',
        data =  {'action': clickBtnValue, 'neighborhood' : neighborhood};
        $.post(ajaxurl, data, function (response) {
            var myJSONText = JSON.stringify(response);
            $("#results").html(myJSONText);
        });
    });

});
