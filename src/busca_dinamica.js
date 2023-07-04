$(document).ready(function() {
    $("#search").keyup(function(e) {
        $("#card").html("");
        var search_query = $(this).val();
        if (search_query != "") {
            $.ajax({
                url: "src\\models\\ReturnList.inc.php",
                type: "POST",
                data: {
                    search: search_query
                },
                success: function($data) {
                    $("#list").fadeIn('fast').html($data);
                    
                }
            });
        } else {
            $("#list").fadeOut();
        }
    });
});


function showbar(){    
    
    const carousel = document.getElementById("carousel")
    carousel.style.display = 'none'
    const barra = document.getElementById("barra")
    barra.style.display = 'block'
}

function hidebar(){    
    const carousel = document.getElementById("carousel")
    carousel.style.display = 'block';
    const barra = document.getElementById("barra");
    barra.style.display = 'none';
    
}