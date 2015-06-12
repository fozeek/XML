$(document).ready(function(){
    $('#requestForm').submit(function(event){
        event.preventDefault();

        var requestUrl = '/front/execute.php';
        var apiUrl = $('#url').val();

        $.post(requestUrl, { 'url' : apiUrl }, function(data){
            $('#result').html(data);
        });
    });

    $('input[name="requestType"]').change(function(){
        if($('input[name="requestType"]:checked').val() == 'GET'){
            $('.elements').hide();
        } else if($('input[name="requestType"]:checked').val() == 'POST'){
            $('.elements').show();
        }
    });

    $('#add').click(function(){

    });

    $('.delete').click(function(){
        
    });
});