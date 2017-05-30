$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var neighborhood = $('select[name=neighborhoods]').val();
        var ajaxurl = 'php/Ajax.php',
        data =  {'action': clickBtnValue, 'neighborhood' : neighborhood};
        $.post(ajaxurl, data, function (response) {
            console.log(response);
            var response = JSON.parse(response);
            var status = response.status;
            $("#status").html(status);
            var results = response.results;
            $("#results").html(results);
        });
    });

});
