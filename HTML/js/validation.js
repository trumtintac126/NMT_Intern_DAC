$(document).ready(function(){
    $flag=1;
    $("#firstName").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#btn-register').attr('disabled',true);
                 $("#error_firstname").text("* You have to enter your first name!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#btn-register').attr('disabled',false);
            $("#error_firstname").text("");

        }
   });
    $("#lastName").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#btn-register').attr('disabled',true);
                $("#error_lastname").text("* You have to enter your Last name!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#btn-register').attr('disabled',false);
            $("#error_lastname").text("");
        }
   });
    $("#dob").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled',true);
                $("#error_dob").text("* You have to enter your Date of Birth!");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_dob").text("");
        }
   });
    $("#gender").focusout(function(){
        $(this).css("border-color", "#2eb82e");
   
   });   
});