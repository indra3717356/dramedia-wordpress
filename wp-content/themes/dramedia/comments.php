<?php
    wp_list_comments(
        array(
            'avatar_size' => 50,
            'style' => 'div',
        )
    );

    if(comments_open()){
        comment_form(
            array(
                'class_form' => ''
            )
        );
    }

?>