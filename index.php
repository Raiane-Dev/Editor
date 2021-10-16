<?php
    if(isset($_POST['acao'])){
        $texto = $_POST['texto'];
        $arquivo = $_POST['arquivo'];
        file_put_contents($arquivo,$texto);
        echo '<script> alert("Salvo com sucesso"); </script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editor de Código</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<?php
    /*
        Função de navegar entre as pastas

        obs: Aparece erro se eu colocar uma pasta que meu index está alocado
    */
    $files = scandir('files');
    for($i = 0; $i < count($files); $i++){
        if(is_dir($files[$i]))
        continue;

        $file_extension = explode('.', $files[$i]);
        if(@$file_extension[1] == 'php' || @$file_extension[1] == 'html' || @$file_extension[1] == 'js'){

?>
    <section class="editor">
        <div class="editor">
            <div class="head-editor">
                <div class="logo">
                    <h2>Raiane Dev</h2>
                </div><!--logo-->
                <div class="extras">
                    <span><i data-feather="plus-circle"></i> Explore</span>
                    <span><i data-feather="pocket"></i> Benchmark</span>
                </div><!--extras-->
            </div><!--head-editor-->

            <div class="editor-lista">
                <nav>
                    <ul>
                        <li><a href="?file=<?php echo $files[$i] ?>"><i data-feather="chevrons-right"></i> <?php echo $files[$i]; ?> </a></li>
                    </ul>
                </nav>
            </div>
        </div><!--editor-->
    </section><!--editor-->

<?php
    }
}
    if(isset($_GET['file']) && file_exists('files/'.$_GET['file'])){ ?>

<section class="editor-codigo">
    <div class="editor-codigo">
        <h2><?php echo 'Editando Arquivo '.$_GET['file']; ?></h2>
        <form method="post">
            <textarea name="texto"><?php echo file_get_contents('files/'.$_GET['file']); ?></textarea>
            <input type="hidden" name="arquivo" value="<?php echo 'files/'.$_GET['file']; ?>" />
            <input type="submit" name="acao" value="Salvar" />
        </form>

    <?php } ?>
    </div><!--editor-codigo-->
</section><!--editor-codigo-->
<script>
  feather.replace()
</script>
</body>
</html>