<?php

    function basicHeader(){
        //basic header sin opciones de menu
        echo '
        <header id="header">
        <h1 id="logo">TurísTicos</h1>
        <nav id="nav">
        </nav>
        </header>
        ';
    }

    function MostrarHeaderAdmin()
    {
        echo '
        
        <header id="header">
        <h1 id="logo"><a href="principal.php">TurísTicos</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="principal.php">Inicio</a></li>
                <li>
                    <a href="#">Servicios</a>
                    <ul>
                        <li><a href="PaquetesCliente.php">Paquetes</a></li>
                        <li><a href="no-sidebar.php">Blog</a></li>
                        <li><a href="reservaciones.php">Reservaciones</a></li>
                        <li>
                            <a href="#">Mantenimientos</a>
                            <ul>
                                <li><a href="ManejoUsuarios.php">Manejo de Usuarios</a></li>
                                <li><a href="hoteles.php">Manejo de Hoteles</a></li>
                                <li><a href="ubicaciones.php">Manejo de Ubicaciones</a></li>
                                <li><a href="ManejoPaquetes.php">Manejo de Paquetes</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="Contacto.php">Contacto</a></li>
                <li><a href="index.php">Salir</a></li>
                
            </ul>
        </nav>
    </header>

        ';
        //<li><a href="registro.php" class="button primary">Registrarme</a></li> //anteriormente era linea 31
    }

    function MostrarHeaderCliente()
    {
        echo '
        
        <header id="header">
        <h1 id="logo"><a href="principal.php">TurísTicos</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="principal.php">Inicio</a></li>
                <li>
                    <a href="#">Servicios</a>
                    <ul>
                        <li><a href="PaquetesCliente.php">Paquetes</a></li>
                        <li><a href="no-sidebar.php">Blog</a></li>
                        <li><a href="reservaciones.php">Reservaciones</a></li>
                    </ul>
                </li>
                <li><a href="Contacto.php">Contacto</a></li>
                <li><a href="index.php">Salir</a></li>
                
            </ul>
        </nav>
    </header>

        ';
        //<li><a href="registro.php" class="button primary">Registrarme</a></li> //anteriormente era linea 31
    }

    function MostrarFooter()
    {
        echo '
        
        <footer id="footer">
		<ul class="icons">
			<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
			<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
			<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
		</ul>
		<ul class="copyright">
			<li>&copy; TurísTicos S.A. Todos los derechos reservados.</li>
		</ul>
	</footer>

	</div>

        ';
    }

 function SendEmailSuscibir($destinatario, $asunto, $cuerpo)
    {
        try
        {
            require 'PHPMailer/src/PHPMailer.php'; //Busca una referencia 
            require 'PHPMailer/src/SMTP.php'; //Busca una referencia 

            $mail = new PHPMailer();
            $mail -> CharSet = 'UTF-8';

            $mail -> IsSMTP(); // Set mailer to use SMTP
            $mail -> Host = 'smtp.office365.com'; //o smtp.gmail.com //*SMTP protocolo para enviar correos
            $mail -> SMTPSecure = 'tls';
            $mail -> Port = 587; // o 25
            $mail -> SMTPAuth = true; // Enable SMTP authentication
            $mail -> Username = 'claseProgra3.5@outlook.com';
            $mail -> Password = 'progra3.5';
            $mail -> SetFrom('claseProgra3.5@outlook.com', "TurisTicos");
            $mail -> Subject = $asunto;
            $mail -> MsgHTML($cuerpo);
            $mail -> AddAddress($destinatario, 'Suscriptor');
            $mail -> send();
        }
        catch(Exception $ex)
        {
            
        }
    } 

    function SendEmailContacto($destinatario, $asunto, $cuerpo)
    {
        try
        {
            require 'PHPMailer/src/PHPMailer.php'; //Busca una referencia 
            require 'PHPMailer/src/SMTP.php'; //Busca una referencia 

            $mail = new PHPMailer();
            $mail -> CharSet = 'UTF-8';

            $mail -> IsSMTP(); // Set mailer to use SMTP
            $mail -> Host = 'smtp.office365.com'; //o smtp.gmail.com //*SMTP protocolo para enviar correos
            $mail -> SMTPSecure = 'tls';
            $mail -> Port = 587; // o 25
            $mail -> SMTPAuth = true; // Enable SMTP authentication
            $mail -> Username = 'claseProgra3.5@outlook.com';
            $mail -> Password = 'progra3.5';
            $mail -> SetFrom('claseProgra3.5@outlook.com', "TurisTicos");
            $mail -> Subject = $asunto;
            $mail -> MsgHTML($cuerpo);
            $mail -> AddAddress($destinatario, 'Usuario');
            $mail -> send();
        }
        catch(Exception $ex)
        {
            
        }
    } 

    
    function SendEmailReservacion($destinatario, $asunto, $cuerpo)
    {
        try
        {
            require 'PHPMailer/src/PHPMailer.php'; //Busca una referencia 
            require 'PHPMailer/src/SMTP.php'; //Busca una referencia 

            $mail = new PHPMailer();
            $mail -> CharSet = 'UTF-8';

            $mail -> IsSMTP(); // Set mailer to use SMTP
            $mail -> Host = 'smtp.office365.com'; //o smtp.gmail.com //*SMTP protocolo para enviar correos
            $mail -> SMTPSecure = 'tls';
            $mail -> Port = 587; // o 25
            $mail -> SMTPAuth = true; // Enable SMTP authentication
            $mail -> Username = 'claseProgra3.5@outlook.com';
            $mail -> Password = 'progra3.5';
            $mail -> SetFrom('claseProgra3.5@outlook.com', "TurisTicos");
            $mail -> Subject = $asunto;
            $mail -> MsgHTML($cuerpo);
            $mail -> AddAddress($destinatario, 'Usuario');
            $mail -> send();
        }
        catch(Exception $ex)
        {
            
        }
    } 


?>
