$(document).ready(function () {
    $('#searchUser').on('keyup', function (e) {
        let username = e.target.value;

        $.ajax({
            url: 'https://api.github.com/users/' + username,
            data: {
                client_id: '0815f16c6dfaca7a8a49',
                client_secret: '8533f549c841a2d57c59eb1cce09fc3f0b62d4c4',
            }
        }).done(function (user) {
            $.ajax({
                url: 'https://api.github.com/users/' + username + '/repos',
                data: {
                    client_id: '0815f16c6dfaca7a8a49',
                    client_secret: '8533f549c841a2d57c59eb1cce09fc3f0b62d4c4',
                    sort : 'created : asc',
                    per_page : 5
                }
            }).done(function(repos){
                console.log(repos);
                $.each(repos ,function(index, repo){
                    $('#repos').append(`
                        <div class="well">
                            <div class="row">
                                <div class="col-md-7">
                                    <strong>${repo.name}</strong> : ${repo.description}
                                </div>
                                <div class="col-md-3">
                                    <span class="label label-default">Fork count : ${repo.forks_count}</span>
                                    <span class="label label-primary">Open issues : ${repo.open_issues}</span>
                                    <span class="label label-success">Watchers : ${user.watchers}</span>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                        </div>
                    `);
                });
            });
            $('#profile').html(`
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">${user.name}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="thumbnail avatar" src ="${user.avatar_url}">
                            <a target="_blank" class="btn btn-primary btn-block" href ="${user.html_url}"> View profile </a>
                        </div>
                        <div class="col-md-9">
                            <span class="label label-default">Public Rwpos : ${user.public_repos}</span>
                            <span class="label label-primary">Public gists : ${user.public_gists}</span>
                            <span class="label label-success">Followers : ${user.followers}</span>
                            <span class="label label-info">Following : ${user.following}</span>
                            <br><br>
                            <ul class="list-group">
                                <li class="list-group-item">Company :${user.company}</li>
                                <li class="list-group-item">Website :${user.blog}</li>
                                <li class="list-group-item">Location :${user.location}</li>
                                <li class="list-group-item">Menber Since :${user.create_at}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="repos"></div>
                      
            `);
        });
    });
});
