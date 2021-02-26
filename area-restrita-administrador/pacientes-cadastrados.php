<html>

    <head>
    
        <meta charset="utf-8">
        <title>ARIS - PACIENTES CADASTRADOS</title>
        <link rel="icon" href="../../../Sistema/ARIS/image/icones/iconeAris.jpg">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/reset.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-gerais.css">
        <link rel="stylesheet" href="../../../Sistema/ARIS/css/estilo-telas-administrador.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/86027f91a6.js" crossorigin="anonymous"></script>
        <?php
            include ("../valida-login.php");
            include ("valida-tipologin.php");
            include_once ('classes/Conexao.php');
            include_once ('classes/Paciente.php');
            
        ?>
    </head>
    <body>
        <div id="esqueleto">
            
            <aside class="animate-right">
                <header class="header-sidebar">
                    <img class="aside-logo" src="../../../Sistema/ARIS/image/logo/logoAris.jpg" alt="ARIS" width="60%">
                </header>
                <section class="secao-itens-sidebar">
                    <nav class="nav-itens-sidebar">
                            <br>
                            <ul> 
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/home-adm.php"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/medicos-cadastrados.php" class="nomeDoLink-btn" ><i class="fas fa-user-md"></i>Médico</a></li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/funcionarios-cadastrados.php" class="nomeDoLink2-btn" ><i class="fas fa-user-nurse"></i>Funcionário</a></li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/pacientes-cadastrados.php" class="nomeDoLink3-btn" ><i class="fas fa-users"></i>Pacientes</a></li>
                                <li><a href="#" class="nomeDoLink4-btn"><i class="fas fa-user-lock"></i>Login
                                        <span class="fas fa-caret-down third"></span>
                                    </a>
                                    <ul class="nomeDoLink4-show">
                                        <li><a href="../../../Sistema/ARIS/area-restrita-administrador/gerenciar-login.php">Gerenciar Login</a></li>
                                    <li><a href="../../../Sistema/ARIS/area-restrita-administrador/login-enfermeiro.php">Enfermeiro</a></li>
                                    <li><a href="../../../Sistema/ARIS/area-restrita-administrador/login-funcionario.php">Funcionário</a></li>
                                    <li><a href="../../../Sistema/ARIS/area-restrita-administrador/login-medico.php">Médico</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../../Sistema/ARIS/area-restrita-administrador/relatorios.php" class="nomeDoLink5-btn" ><i class="fas fa-chart-line"></i>Relatórios</a></li>
                            </ul>
                        </nav>
                    <script>
                        $('.nomeDoLink-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink-show').toggleClass("show");
                        });
                        $('.nomeDoLink2-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink2-show').toggleClass("show2");
                        });
                        $('.nomeDoLink3-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink3-show').toggleClass("show3");
                        });
                        $('.nomeDoLink4-btn').click(function(){
                            $('.nav-itens-sidebar ul .nomeDoLink4-show').toggleClass("show4");
                        });
                    </script>
                </section>
                <footer class="icones-sidebar">
                    <div class="div-icones-sidebar">
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </footer>
            </aside>
            
        </div>
        <section class="main">
            <div class="titulo-descricao-main">
                <h2>PACIENTES CADASTRADOS</h2>
                <hr>
            </div>
            
            <div class="area-restrita-adm-pacientes-cadastrados">
            <form action="<?php echo $_SERVER ['PHP_SELF'];?>" method="POST" class="form-formularios">
                    <div class="input-container campo-form-solitario">
                        <input maxlength="15" id="numeroDoCartaoSUS" name="numCartaoSus" class="input-form" type="text" pattern=".+" required />
                        <label class="label-form" for="numeroDoCartaoSUS">Número do cartão do SUS</label>
                    </div>
                    <button type="submit" class="search-btn-form"><i class="fas fa-search"></i></button>
                </form>
                <div class="pesquisa-pacientes">
                    <br>
                    <table class="table table-striped">

                    <?php
                        try {
                            @$numCartaoSus = $_POST['numCartaoSus'];

                            $Paciente = new Paciente();
                            $lista = $Paciente->listar($numCartaoSus);
                            $listaTodos = $Paciente->listarTodos();
                        } catch(Exception $e) {
                            echo '<pre>';
                                print_r($e);
                            echo '</pre>';
                            echo $e->getMessage();
                        }
                    ?>
                                <thead>
                                <tr>
                                    <th scope="col">Cartão SUS</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Imprimir</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if(isset($numCartaoSus)){
                                    foreach($lista as $linha){
                                        echo "<tr>";
                                        echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                        echo "<td>".$linha['nomePaciente']."</td>";
                                        echo "<td>".date('d-m-Y',strtotime($linha['dataNascimentoPaciente']))."</td>";
                                        echo "<td><a type='button' href='classes/pdf-prontuario.php'><i class='fas fa-download'></i></a></td>";
                                        echo "</tr>";
                                    }
                                }else{
                                    foreach($listaTodos as $linha){
                                        echo "<tr>";
                                        echo "<td>".$linha['numCartaoSusPaciente']."</td>";
                                        echo "<td>".$linha['nomePaciente']."</td>";
                                        echo "<td>".date('d-m-Y',strtotime($linha['dataNascimentoPaciente']))."</td>";
                                        echo "<td><a type='button' href='classes/pdf-prontuario.php?id=".$linha['codPaciente']."'><i class='fas fa-download'></i></a></td>";
                                        echo "</tr>";
                                    }
                                }
                               
                        ?>
                                </tbody>
                            </table>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>