<html>
    <head>
        <title>AutoLamp</title>
        <meta charset="utf-8">
        <link href="css/signin.css" rel="stylesheet">
        <link rel="stylesheet" href="css/loja.css">

        <link rel = "stylesheet"
              href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet"
              href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
        <script type = "text/javascript"
        src = "https://code.jquery.com/jquery-3.0.0.min.js"></script>           
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js">
        </script> 

        <script >
            (function ($) {
                $(function () {

                    $('.dropdown-trigger').dropdown({
                        inDuration: 300,
                        outDuration: 225,
                        hover: true, // Activate on hover
                        belowOrigin: true, // Displays dropdown below the button
                        alignment: 'right' // Displays dropdown with edge aligned to the left of button
                    }
                    );

                }); // End Document Ready
            })(jQuery); // End of jQuery name space

        </script>
        <script>

            $(document).ready(function () {
                $('select').material_select();
            });

        </script>
        <script>
            $(document).ready(function () {
                $('.tooltipped').tooltip();
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.checkbox').tooltip();
            });
        </script>
       
    </head>
    <style type="text/css">
        .brand-logo{
            font-weight:700;
        }

        .dropdown-content {
            background-color: #FFFFFF;
            margin: 0;
            display: none;
            min-width: 200px; /* Changed this to accomodate content width */
            max-height: auto;
            margin-left: -1px; /* Add this to keep dropdown in line with edge of navbar */
            overflow: hidden; /* Changed this from overflow-y:auto; to overflow:hidden; */
            opacity: 0;
            position: absolute;
            white-space: nowrap;
            z-index: 1;
            will-change: width, height;
        }
    </style>
    <nav>
        <div class="nav-wrapper deep-orange lighten-1">
            <a href="index.php" class="brand-logo">AutoLamp</a>
            <a href="#" data-activates="menu-mobile" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_prof" data-beloworigin="true">Professor<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_prof" class="dropdown-content  collection">
                    <li class="nav-item">
                        <a class="nav-link" href="AdicionaUsuario.php">Cadastrar Professor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListaUsuario.php">Listar Professor</a>
                    </li>


                </ul>
                </li>
                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_aci" data-beloworigin="true">Acionar<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_aci" class="dropdown-content  collection">
                    <li class="nav-item">
                        <a class="nav-link" href="Manual.php">Acionar Manualmente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programado.php">Programar Acionamento</a>
                    </li>


                </ul>
                </li>

                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_dis" data-beloworigin="true">Disciplina<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_dis" class="dropdown-content  collection">
                  
                    <li class="nav-item">
                        <a class="nav-link" href="ListaDisciplina.php">Listar Disciplina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AdicionaDisciplina.php">Cadastrar Disciplina</a>
                    </li>


                </ul>
                </li>
                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_aula" data-beloworigin="true">Aula<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_aula" class="dropdown-content  collection">
                    <li class="nav-item">
                        <a class="nav-link" href="ConfiguraDisciplina.php">Configurar Aula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListaAula.php">Listar Aula</a>
                    </li>
                


                </ul>
                </li>
                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_sala" data-beloworigin="true">Sala<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_sala" class="dropdown-content  collection">

                    <li class="nav-item">
                        <a class="nav-link" href="AdicionaSala.php">Cadastrar Sala</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListarSala.php">Listar Sala</a>
                    </li>
                </ul>
                </li>
                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_porta" data-beloworigin="true">Porta<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_porta" class="dropdown-content  collection">

                    <li class="nav-item">
                        <a class="nav-link" href="AdicionaPorta.php">Cadastrar Porta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListaPorta.php">Listar Porta</a>
                    </li>
                </ul>
                </li>
                <li>
                <li><a class="dropdown-trigger deep-orange lighten-1" href="#!" data-activates="dropdown_equipamento" data-beloworigin="true">Equipamento<i class="material-icons right">arrow_drop_down</i></a></li>

                <!-- Dropdown Structure -->
                <ul id="dropdown_equipamento" class="dropdown-content  collection">

                    <li class="nav-item">
                        <a class="nav-link" href="AdicionaEquipamento.php">Cadastrar Equipamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListaEquipamento.php">Listar Equipamento</a>
                    </li>
                </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Sair da conta</a>
                </li>

            </ul>



            <ul class="side-nav" id="menu-mobile">

                <li class="nav-item">
                    <a class="nav-link" href="AdicionaUsuario.php">Cadastrar Professor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListaUsuario.php">Listar Professor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adiciona-sala.php">Cadastrar Sala</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manual.php">Acionar Manualmente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="programado.php">Programar Acionamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista-alarme.php">Listar Alarme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conf_disciplina.php">Configurar Disciplina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listar_disciplina.php">Listar Disciplina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adiciona-disciplina.php">Cadastrar Disciplina</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair da conta</a>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        $(function () {
            $(".button-collapse").sideNav();
        });
    </script>