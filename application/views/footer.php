<div id="editActionWindow" class="modal "><!-- modal-fixed-footer-->
    <div class="modal-header">
        <h5 class="title">test</h5>
    </div>
    <div class="modal-content">
        
    </div>
    <!--<div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
        <a href="#!" class="modal-action waves-effect waves-green btn-flat ">Save</a>
    </div> -->
</div>
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            &copy; <?php echo date('Y'); ?> , 
        </div>
    </div>
</footer>
<?php echo $common_js;?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('body').on('click','.closeEditModelWin',function(){
            $('#editActionWindow').modal('close');
        });
    });
</script>
</body>
</html>