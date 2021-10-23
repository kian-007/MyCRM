<?php


function get_title(){
    echo 'صفحه اصلی';
}


function get_content(){ ?>
  
	
  
  
    <!--<p style="font-size: 17pt;">محتوای این صفحه برای همه قابل دیدن است.</p>-->
    <p class="pp">users count: <?php echo user_count(); ?></p>

    <h3>برگه ها:</h3>
    <div class="pp" id="div1">
        <?php $page_count = page_count();
        echo "در این سیستم ".'<b>'.$page_count.'</b>'." صفحه تعریف شده است.";
        ?>
        
        <?php display_pages_list(); ?>
    </div>
    

    
        


    <div class="pp cubic">
        <?php 
            global $pdo;
            $result = $pdo->query("
            select * from pages
            ORDER BY id DESC LIMIT 1;
            ");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $id =  $row['id'];

            $last_page = get_page($id);
            // foreach($row as $row){
            //     echo $row['id'].'<br>';
            // }
        ?>

        <a href="<?php echo get_page_edit_url($id); ?>"  title="ویرایش یادداشت"><img style="position: relative; right: 170px"   src="<?php echo home_url('include/image/pencil.svg'); ?>"	alt="add"/></a>
        <a href="<?php echo home_url('new'); ?>"  title="صفحه جدید"><img style="position: relative; right: 185px"   src="<?php echo home_url('include/image/diff-added.svg'); ?>"	alt="add"/></a>
        <span style="color:red; font-size:larger"><strong>دفترچه یادداشت</strong></span>
        <br>

        <<<?php echo $last_page['title']; ?>>>
        <br>
        <?php echo $last_page['content']; ?>
        
    </div>
    
<?php }


function get_style(){ ?>
    <style>
        
        
        
        
        h3{
            margin-top: 25px;
            clear: both;
        }
        .cubic{
            width: 170px;
            height: 170px;
            text-align: center;
            margin-left: 25px;
            margin-top: 25px;
        }
        
        
/* 
        @-webkit-keyframes a1 {
            to{
                padding: 20px;
            }
        }
*/
        
            
/* 
            margin: 25px;
            height: 30px;
            padding-right: 10px;
            border-radius: 15px;
            border-bottom: solid 1px rgba(100, 100, 100 , 0.5);
            box-shadow: 7px 7px 10px rgba(150, 150, 150 , 1) inset, -7px -7px 10px ;
            width: 700px;
        }
        .container-lg{
            background-color: rgba(230, 230, 230 , 0.3);
            border-radius: 3em;
        }
*/

        
    </style>
<?php }
