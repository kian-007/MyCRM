<?php


function get_title(){
    global $current_page;
    return $current_page['title'];
}


function get_content(){
    global $current_page;
    echo $current_page['content'];
    
    $id = $current_page['id'];
    ?>

    <?php if(is_user_logged_in()):?>
    <br>
    <a class="btn btn-primary" href="<?php echo get_page_edit_url($id); ?>">ویرایش</a>
    <?php endif; ?>

<?php }

