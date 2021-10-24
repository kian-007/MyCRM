<?php

function authentication_required(){
    return true;
}

function get_title(){
    return 'صفحه چت';
}

function get_content(){ ?>

<div class="row">
    <div class="col-6 col-md-2"></div>
    
    <div class="col-6 col-md-8">
        
        <div class="pp float_right" style="height: 550px; width: 100%">
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
        </div>
        
    </div>
    
    <div class="col-6 col-md-2"></div>
</div>

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
            height: 370px;
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