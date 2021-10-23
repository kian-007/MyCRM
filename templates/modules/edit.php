<?php


function get_title(){
    echo 'ویرایش یادداشت';
}


function authentication_required(){
    return true;
}

function get_content(){ ?>

<?php
$page = get_page($_GET['id']); 
if(!$page){
    echo 'لینک نادرست است.';
    return;
}
?>

<script src="https://cdn.tiny.cloud/1/pab05hdabof5zwoz0b2l4fs6x2ouvbj46g8od3vw3o7h5m1a/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<div class="row">
    <div class="col-1 col-md-2"></div>
    
    <div class="col-10 col-md-8">
        <h3>ویرایش</h3>
        <hr>
        <br>

        <form method="post">
              <div class="mb-3">
                    <label for="title" class="form-label">عنوان</label>
                    <input class="form-control" id="title" name="title" placeholder="Title" aria-describedby="emailHelp" value="<?php echo $page['title']; ?>">
              </div>
              <div class="mb-3">
                    <label for="slug" class="form-label">نامک</label>
                    <input class="form-control" id="slug" name="slug" placeholder="Slug" aria-describedby="emailHelp" value="<?php echo $page['slug']; ?>">
              </div>
              <div class="mb-3">
                    <label for="content" class="form-label">محتوای برگه</label>
                    <textarea id="content" class="form-control" name="content" rows="7" cols="10"><?php echo $page['content']; ?></textarea>
              </div>
              <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="hidden" name="hidden" <?php echo $page['hidden'] ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="hidden">مخفی بودن برگه</label>
              </div>
              <button type="submit" class="btn btn-primary">ذخیره کردن</button>
        </form>

    </div>
    
    <div class="col-1 col-md-2"></div>
</div>



<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      directionality: 'rtl',
   });
  </script>
  
<?php }





function process_inputs(){
    
  if(empty($_POST)){
      return;
  }
   
  $page = $_POST;
  $page['id'] = $_GET['id'];
  
  if(isset($page['hidden']) && $page['hidden'] == 'on'){
      $page['hidden'] = 1;
  } else {
      $page['hidden'] = 0;
  }
  
  update_page($page);
}
