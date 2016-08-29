$(document).ready(function() {
    $(this).on('mouseover mouseout', '.non-favorites li', function() {
        $('.add', this).toggleClass('favorite');
    });
    
    $requestRunning = false;
    
    $(document).on('click', '.non-favorites .add', function() {
        if ( $requestRunning ) {
            return;
        }

        $id = ($(this).attr('id').split('_'));
        $id = $id[1];
        $title = $(this).text();
        $this = $(this);
        
        $.ajax({
            url: 'ajax/add-favorites.ajax.php',
            type: 'POST',
            data: {
                'user_id' : $userID,
                'movie_id' : $id
            },
            beforeSend: function() {
                $requestRunning = true;
                $this.remove();
            },
            success: function() {
                $requestRunning = false;
                $('ul.favorites').append('<li class="movie-list" id="movie_"' + $id + '>' + $title + '</li>');
                $(".favorites li#movie-" + $id).draggable({
                   helper: 'clone'            
                });                
            }
        });
    });
});

