$(document).ready(function(){
    $('#requestForm').submit(function(event){
        event.preventDefault();

        var requestUrl = '/front/execute.php';
        var apiUrl = $('#url').val();

        
        if($('input[name="requestType"]:checked').val() == 'GET'){
            $.ajax({ url : apiUrl, endpoint: apiUrl, request: 'GET', contentType:'text/plain' }).done(function(data){
                console.log(data);
                if(typeof data === 'string') {
                    $('#result').html(data);
                } else {
                    $('#result').html(new XMLSerializer().serializeToString(data));
                }
                $('#result').css('border-color', 'green');
            }).fail(function(data) {
                console.log(data);
                $('#result').html(data.responseText);
                $('#result').css('border-color', 'red');
            });
        } else if($('input[name="requestType"]:checked').val() == 'POST'){
            var data = {};
            $('.post-key').each(function(i, el) {
                data[$(el).val()] = $(el).parent().parent().find('.post-value').val();
            });
            $.ajax({ url : apiUrl, endpoint: apiUrl, method: 'POST', data: data }).done(function(data){
                console.log(data);
                if(typeof data === 'string') {
                    $('#result').html(data);
                } else {
                    $('#result').html(new XMLSerializer().serializeToString(data));
                }
                $('#result').css('border-color', 'green');
            }).fail(function(data) {
                $('#result').html(data.responseText);
                $('#result').css('border-color', 'red');
            });
        } else if($('input[name="requestType"]:checked').val() == 'DELETE'){
            $.ajax({ url : requestUrl, data: {endpoint: apiUrl, method: 'DELETE'}, method: 'POST' }).done(function(data){
                console.log(data);
                if(typeof data === 'string') {
                    $('#result').html(data);
                } else {
                    $('#result').html(new XMLSerializer().serializeToString(data));
                }
                $('#result').css('border-color', 'green');
            }).fail(function(data) {
                $('#result').html(data.responseText);
                $('#result').css('border-color', 'red');
            });
        }
    });

    $('input[name="requestType"]').change(function(){
        if($('input[name="requestType"]:checked').val() == 'GET' || $('input[name="requestType"]:checked').val() == 'DELETE'){
            $('.elements').hide();
        } else if($('input[name="requestType"]:checked').val() == 'POST'){
            $('.elements').show();
        }
    });

    $('#add').click(function(){
        var cpt = parseInt($(this).attr('data-cpt'));
        $('.elements').append('<div class="row" id="row1"><div class="col-lg-2"><input type="text" class="form-control post-key" id="header" name="key[]" placeholder="Cle ' + cpt + '">    </div><div class="col-lg-9"><input type="text" class="form-control post-value" id="value" name="value[]" placeholder="Valeur' + cpt + '">    </div><button type="button" class="delete">x</button></div>');
        
        $(this).attr('data-cpt', cpt + 1);
    });

    $('.elements').on('click', '.delete', function(){
        $(this).parent().remove();
    });
});