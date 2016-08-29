$(document).ready(function() {
                  
    $('.favorites li').draggable({
        helper: 'clone',
        drag: function() {
            $('.trash').addClass('trash_hover');
        }
    });

    $('.trash').droppable({
        accept: '.favorites li', 
        drop: function(event, ui) {
            $id = $(ui.draggable).attr('id').split('_');
            $id = $id[1];
            
            $this = $(ui.draggable);  
            $title = $(ui.draggable).text();
            
            $.ajax({
                url: 'ajax/remove-favorites.ajax.php',
                type: 'POST',
                data: {
                    'user_id' : $userID,
                    'movie_id' : $id
                },
                beforeSend: function() {
                    $this.remove();
                },
                success: function() {
                    $("ul.non-favorites").append('<li class="movie-list" id="movie-"' + $id + '>' + $title + '</li>');
                }
            });
        }
    });
    
});

