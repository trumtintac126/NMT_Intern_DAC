$(document).ready(function () {
    $('#getText').click(function () {
        $.ajax({
            url: 'https://reqres.in/api/users?page=2',
        }).done(function (data) {
            console.log(data);
            $('#output').text(JSON.stringify(data));
        })
    });
    $('#getUsers').click(function () {
        $.ajax({
            url: 'https://reqres.in/api/users?page=2',
        }).done(function (result) {
            console.log(result);
            for (i = 0; i < result.data.length; i++) {
                $('#output').append(`
           
                <ul>
                    <li>${result.data[i].first_name}</li>
                    <li>${result.data[i].last_name} </li>
                    <li><img src="${result.data[i].avatar}"> </li>
                </ul>
            `);
            }
        })
    })
    $('#submit').click(function(){

        var title = $('#title').val();
        var body = $('#body').val();
        $.ajax({
            url : 'https://reqres.in/api/users',
            type : "POST",
            dataType:"json",
            data : {name: title,job : body},
            success : function(result){
                    console.log(result); 
            }
        })
    })
    $('#update').click(function(){

        var title = $('#title').val();
        var body = $('#body').val();
        $.ajax({
            url : 'https://reqres.in/api/users/2',
            type : "Put",
            dataType:"json",
            data : {name: title,job : body},
            success : function(result){
                    console.log(result); 
            }
        })
    });
    $('#delete').click(function(){
        $.ajax({
            url : 'https://reqres.in/api/users/2',
            type : "delete",
            dataType:"json",
            data : {name: title,job : body},
            success : function(result){
                    console.log(result); 
            }
        })
    });
});
