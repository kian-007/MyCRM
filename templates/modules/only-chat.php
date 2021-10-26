<?php

function authentication_required(){
    return true;
}

function get_title(){
    echo 'صفحه چت';
}

function get_content(){ ?>

<div class="row">
    <div class="col-1 col-md-2"></div>
    
    <div class="col-10 col-md-8">
        
        <div class="pp float_right" style="height: 550px; width: 100%; margin-right: 0">
            <form method="post">
                <?php $page = get_page_by_slug('chat'); ?>
                <div id="showtxt"><div><?php echo $page['content']; ?></div><a id="downnn" name="down"></a></div>
                <p class="type">
                    <span style="position: absolute; bottom: 100px;"><?php $user = get_current_user_data(); echo $user['username']; ?></span>
                    <textarea id="txt" name="txt" onkeyup="txt_keyup(event)"></textarea>
                </p>
                <button id="send" type="submit" class="btn btn-sm btn-success" onclick="send(event)" >Send</button>
                <button id="delete" name="delete" type="submit" class="btn btn-sm btn-danger" onclick="send(event)">delete</button>
                <a id="downn" href="#down"><img src="<?php echo home_url('include/image/arrow-down.svg'); ?>" /></a>
            </form>
        </div>
        
    </div>
    
    <div class="col-1 col-md-2"></div>
</div>

<?php }




function process_inputs(){
    if(empty($_POST)){
        return;
    }
    $page = get_page_by_slug('chat');
    $user = get_current_user_data();
    $page['content'] = ' <span style="font-size: 7pt" class="'.$user['username'].'"> '.$user['username'].'</span>    <span class="msg" id="'.$user['username'].'"> '.$_POST['txt'].' </span> <br>';
    update_page($page);
    
    if(isset($_POST['delete'])){
        $page['content'] = " ";
        add_page($page);
    }
}





function get_style(){ ?>
    <style>
        
        <?php 
            $user = get_current_user_data();
            $username = $user['username'];
//            if($user['username'] == 'kian_se'){
//                echo "#kian_se {background-color: green ; margin-left: 60%} "
//                   . ".kian_se {color:purple;}";
//            }elseif($user['username'] == 'kia_hm'){
//                echo "#kia_hm {background-color: green; margin-left: 60%}"
//                   . ".kia_hm {color:red;}";}
            echo "#$username {background-color: green; margin-left: 60%}"
               . ".$username {color:purple;}";
        ?>
        
        .msg {
            background-color:blue;
            color:white;
            height: 50px;
            border-radius:30px;
        }
        
        #showtxt {
            border-bottom: 2px solid blueviolet;
            border-right: 2px solid blueviolet;
            border-radius: 35px 0px 35px 35px;
            width: 90%;
            height: 370px;
            position: relative;
            right: 35px;
            overflow: auto;
            text-align: left;
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
            bottom: 60px;
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
            top: 50px;
            right: 15px;
            border: solid 1px brown;
            border-radius: 2em;
        }
        
        .cubic{
            width: 170px;
            height: 170px;
            text-align: center;
            margin-left: 25px;
            margin-top: 25px;
        }
        
        
    </style>
<?php }




function get_script(){ ?>
    
    <script>
           function txt_keyup(e){
               if(e.keyCode == 13){
                   document.getElementById('send').click()
               }
           }
           function txt_focus(){
               document.getElementById('txt').focus()
           }
           
           var elmnt = document.getElementById("downnn");
           function scrollToBottom() {
             elmnt.scrollIntoView(false); // Bottom
           }
    </script>

<?php }