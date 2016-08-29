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
            $this = $(ui.draggable);
            $id = $this.attr('id').split('-');
            $id = $id[1];
            $title = $this.text();
            $description = $this.attr('title');
            
            $.ajax({
                url: 'ajax/remove-favorites.ajax.php',
                type: 'POST',
                data: {
                    'user_id' : $userID,
                    'movie_id' : $id
                },
                beforeSend: function() {
                    $this.remove();
                    $('.trash').addClass('trash_hover')
                },
                success: function() {
                    $output =  '<li id="nonfavorite-' + $id + '">';
                    $output += '<figure>';
                    $output += '<a href="/?movie_id=' + $id + '&amp;user_id=' + $userID + '"><img src="img/movies/' + $id + '-tn.png" class="thumbnail" alt="' + $title + '" onerror=this.src="generic-tn.png"></a>';
                    $output += '<figcaption>';
                    $output += '<h3><a href="/?movie_id=' + $id + '&amp;user_id=' + $userID + '">' + $title + '</a></h3>';
                    $output += '<div class="description">' + $description + '</div>';
                    $output += '<div class="add"></div>';
                    $output += '</figcaption>';
                    $output += '</figure>';
                    $output += '</li>';
                    
                    $('ul.non-favorites').prepend($output);
                    $('.trash').removeClass('trash_hover')
                }
            });
        }
    });
    
});

