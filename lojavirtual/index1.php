<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Formulário do cliente</title>
        <script src="js/jquery-1.8.2.min.js" type="text/javascript" ></script>
        <style>
               label{
                display: block;
            }
            .window{
                display:none;
                width:200px;
                height:300px;
                position:absolute;
                left:0;
                top:0;
                background:#FFF;
                z-index:9900;
                padding:10px;
                border-radius:10px;
            }
            #mascara{
                display:none;
                position:absolute;
                left:0;
                top:0;
                z-index:9000;
                background-color:#000;
            }
            .fechar{display:block; text-align:right;}
        </style>
    </head>
    <body>
        <a href="#janela1" rel="modal">Novo Cliente</a>
<!--        Tabela de exibição dos dados-->
        <div id="table">
            <table  border="1px" cellpadding="5px" cellspacing="0">
                <tr>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Cpf</td>
                    <td>Investimento</td>
                </tr>
                <?php

                //include 'connection.php';

                $serverName = "user\SQLEXPRESS";
                $connectionInfo = array( "Database"=>"LOJA", "UID"=>"yuri", "PWD"=>"" );
                $conn = sqlsrv_connect( $serverName, $connectionInfo);
                $sql = "INSERT INTO Cliente (id, nome) VALUES (?, ?)";
                $params = array(1, "nome");
                $stmt = sqlsrv_query( $conn, $sql, $params);
                $select = "SELECT * FROM Cliente";
                $result = sqlsrv_query( $conn, $sql, $params);

                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
                    echo $row[0].", ".$row[1]."<br />"; 
                    $nome = $row['nome'];
                    $email = $row['email'];
                    $cpf = $row['cpf'];
                    $investimento = $row['investimento'];

                    echo"   <tr>
                
                <td>$nome</td>
                <td>$email</td>
                <td>$cpf</td>
                <td>$investimento</td>
            </tr>";
                }
                ?>
            </table>

            <div class="window" id="janela1">
                <a href="#" class="fechar">X Fechar</a>
                <h4>Cadastro de usuario</h4>
                <form id="cadCliente" action="" method="post">
                    <label>Nome:</label><input type="text" name="nome" id="nome" />
                    <label>Email:</label><input type="text" name="email" id="email" />
                    <label>:</label>Cpf:<input type="text" name="cpf" id="cpf" />
                    <label>:</label>Investimento:<input type="text" name="investimento" id="investimento" />
                    <br/><br/>
                    <input type="button" value="Salvar" id="salvar" />
                </form>
            </div>
            <div id="mascara"></div>
        </div>
    </body>
</html>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('#salvar').click(function() {

            var dados = $('#cadCliente').serialize();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'salvar.php',
                async: true,
                data: dados,
                success: function(response) {
                    location.reload();
                }
            });

            return false;
        });

        $("a[rel=modal]").click(function(ev) {
            ev.preventDefault();

            var id = $(this).attr("href");

            var alturaTela = $(document).height();
            var larguraTela = $(window).width();

            $('#mascara').css({'width': larguraTela, 'height': alturaTela});
            $('#mascara').fadeIn(1000);
            $('#mascara').fadeTo("slow", 0.8);

            var left = ($(window).width() / 2) - ($(id).width() / 2);
            var top = ($(window).height() / 2) - ($(id).height() / 2);

            $(id).css({'top': top, 'left': left});
            $(id).show();
        });

        $("#mascara").click(function() {
            $(this).hide();
            $(".window").hide();
        });

        $('.fechar').click(function(ev) {
            ev.preventDefault();
            $("#mascara").hide();
            $(".window").hide();
        });

    });
</script>