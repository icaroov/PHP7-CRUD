<?php
//Sessão para mostrar as menssagens de erro
session_start();

if(isset ($_SESSION['menssagem'])): ?>
<script>
    window.onload = function (){
        M.toast({html: '<?php echo $_SESSION['menssagem']; ?>'});
    };
</script>

<?php
endif;
session_unset();
?>