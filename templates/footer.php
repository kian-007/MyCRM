        </div> <!-- End of container --> 
        
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <script src="<?php echo SITE_URL; ?>include/js/bootstrap.bundle.min.js"></script>
        
        <?php
        simple_load_module();
        if(function_exists('get_script')){
            get_script();
        }
        ?>
        
    </body>
</html> 