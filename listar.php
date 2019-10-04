<?php require_once 'class/listaarquivo.php'; ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <div class="menu-bar">
        <div class="menu-itens">
        <a class="menu-iten" href="inicial.php">Cadastrar</a>
        <a class="menu-iten" href="listar.php">Listar</a>
        </div>
    </div>
    <section>
    <div class="form-new">
        <table class="file-list">
            <tr>
                <th>Codigo</th>
                <th>Arqivos</th>
            </tr>

            <?php
            $files = new Files();
            $list = $files->getDirs();

            foreach ($list as $line) {
                if ($line == ".." || $line == ".") continue;
                print '<tr>';
                print '<td>' . $line . PHP_EOL . '</td>';
                print "<td>";
                print "<table class='tableintable'>";

                $filesfromdir = $files->getFiles($line);

                foreach ($filesfromdir as $file) {
                    if ($file == ".." || $file == ".") continue;
                    print '<tr><td>' . $file . PHP_EOL;
                    print '</td><td>';
                    print "<button class='view-button' onclick=openmodal('" . urlencode($line) . "','" . urlencode($file) . "');><i class='fa fa-eye'></i></button>";
                    print "<button class='trash-button' onclick=deletefile('" . urlencode($line) . "','" . urlencode($file) . "');><i class='far fa-trash-alt'></i></button>";
                    print '</td></tr>';
                }

                print "</table>";
                print "</td>";
                print "</td>";
                print '</tr>';
            }

            ?>
        </table>
        
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick=closeModal()>&times;</span>
                <iframe scrolling="no" id="iframeModalWindow" height="100%" width="100%" src="" class="iframestyle" name="iframe_modal"></iframe>
            </div>
        </div>
    </div>
    </section>
</body>

</html>