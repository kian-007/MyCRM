<?php

    
    

function get_title(){
    echo 'صفحه اصلی';
}


function get_content(){ ?>
  
    <!--<p style="font-size: 17pt;">محتوای این صفحه برای همه قابل دیدن است.</p>-->
    <p class="pp">تعداد کاربران سیستم: <?php echo user_count(); ?></p>
    
    <?php if(is_user_logged_in()): ?>
<!--    <div class="pp float_right" style="height: 450px; width: 60%">
        <form method="post">
            <?php $page = get_page_by_slug('chat'); ?>
            <div id="showtxt"><div><?php echo $page['content']; ?></div><a name="down"></a></div>
            <p class="type">
                <span style="position: absolute; bottom: 100px;"><?php $user = get_current_user_data(); echo $user['username']; ?></span>
                <textarea id="txt" name="txt"></textarea>
            </p>
            <button id="send" type="submit" class="btn btn-sm btn-success" onclick="send(event)">Send</button>
            <button id="delete" name="delete" type="submit" class="btn btn-sm btn-danger" onclick="send(event)">delete</button>
            <a id="downn" href="#down"><img src="<?php echo home_url('include/image/arrow-down.svg'); ?>" /></a>
        </form>
    </div>-->
    <?php endif; ?>
    


    <h3>برگه ها:</h3>
    <div class="pp float_right" id="div1" style="width: 60%">
        <?php $page_count = page_count();
        echo "در این سیستم ".'<b>'.$page_count.'</b>'." صفحه تعریف شده است.";
        ?>
        
        <?php display_pages_list(); ?>
    </div>

    
    
    <?php if(is_user_logged_in()): ?>
    <div class="pp cubic float_right" style="width: 350px;">
        <?php 
            $id = get_last_page_id();
            $last_page = get_page($id);
            if($last_page['slug'] == 'chat'){
                $id--;
            }
            $last_page = get_page($id);
            // foreach($row as $row){
            //     echo $row['id'].'<br>';
            // }
        ?>
        <a href="<?php echo get_page_edit_url($id); ?>"  title="ویرایش یادداشت"><img style="position: relative; right: 170px"   src="<?php echo home_url('include/image/pencil.svg'); ?>"	alt="add"/></a>
        <a href="<?php echo home_url('new'); ?>"  title="صفحه جدید"><img style="position: relative; right: 185px"   src="<?php echo home_url('include/image/diff-added.svg'); ?>"	alt="add"/></a>
        <span style="color:red; font-size:larger"><strong>دفترچه یادداشت</strong></span>
        <br>

        <a href="<?php echo get_page_url($id); ?>" style="text-decoration: none; color: white;">«<?php echo $last_page['title']; ?>»</a>
        <br>
        <?php echo $last_page['content']; ?>
    </div>
    <?php endif; ?>
    
    
    
<?php }




function process_inputs(){
    if(empty($_POST)){
        return;
    }
    $page = get_page_by_slug('chat');
    $user = get_current_user_data();
    $page['content'] = ' <span style="font-size: 7pt"> '.$user['username'].'</span>    <span id="msg"> '.$_POST['txt'].' </span> <br>';
    update_page($page);
    
    if(isset($_POST['delete'])){
        $page['content'] = " ";
        add_page($page);
    }
}



function get_style(){ ?>
    <style>
        #msg {
            background-color:purple;
            color:white;
            height: 50px;
            border-radius:30px;
            margin-right:20px;
        }
        
        #showtxt {
            border-bottom: 2px solid blueviolet;
            border-right: 2px solid blueviolet;
            border-radius: 35px 0px 35px 35px;
            width: 90%;
            height: 270px;
            position: relative;
            right: 35px;
            overflow: auto;
        }
        
        .left {
            text-align: left;
        }
        .right {
            text-align: right;
        }
        
        #send {
            float: left;
            position: relative;
            bottom: 50px;
            left: 50px;
        }
        #delete {
            float: left;
            position: relative;
            bottom: 10px;
            left: 4px;
        }
        
        #downn {
            float: left;
            position: relative;
            bottom: 150px;
            left: 50px;
        }
        
        #txt {
            border-color: white;
            width: 97%;
            height: 95px;
            border-radius: 2em 0em 2em 2em;
            float: left;
        }
        
        .type {
            background-color: white;
            width: 85%;
            height: 100px;
            position: relative;
            top: 45px;
            right: 15px;
            border: solid 1px brown;
            border-radius: 2em;
        }
        
        
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



function get_script(){ ?>
    
    <script>
        
//        function send(){
//            var txt = document.getElementById('txt').value
//            var message = document.createElement('div')
//            message.id = 'msg'
//            message.innerHTML = txt+'<br>'
//            document.getElementById('showtxt').appendChild(message)
//                
//        }

        function send(e){
            e.preventDefault()
        }
    </script>

<?php }

