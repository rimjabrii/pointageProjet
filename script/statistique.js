$(document).ready(function () {
        function getCountFrom(url, i) {
            $.ajax({
                url: url,
                data: {op: ''},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    $('h2[class="number"]').eq(i).text(data.length);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('h2[class="number"]').eq(i).text('...');
                }
            });
        }
        getCountFrom('controller/gestionclasses.php', 0);
        
        getCountFrom('controller/gestionfiliere.php', 1);
    });