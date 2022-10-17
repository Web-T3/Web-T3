<html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/LR.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Multimedia/icono_arbol.png">
    <title>Register-Login</title>
    </head>
    <body>
        <?php
            if(isset($_POST['inv'])){
                header('Location: index.html');
                die();
            }
            if(isset($_POST['register'])){
            // Aldagaiak hartu
            $mail = isset($_REQUEST['mailR']) ? $_REQUEST['mailR'] : null;
            $nick = isset($_REQUEST['nicknameR']) ? $_REQUEST['nicknameR'] : null;
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
            $pass = isset($_REQUEST['pswdr']) ? $_REQUEST['pswdr'] : null;
            $passc = isset($_REQUEST['pswdc']) ? $_REQUEST['pswdc'] : null;
            $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : null;
            $rol = 'Invitado';
            $group = '1';
            $rbook = '-';

            // aldagaiak
            $hostDB = 'wger1dbvpc1.clfizgthaamq.us-east-1.rds.amazonaws.com';
            $nombreDB = 'e1webgune';
            $usuarioDB = 'admin';
            $contrasenyaDB = 'NausicaA';
            // Datu basearekin konektatu
            $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
            $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
            if($pass == $passc){
            // Preparatu INSERT
            
            $miInsert = $miPDO->prepare('INSERT INTO `Usuarios` (`mail`, `nickname`, `nombre`, `apellido`, `contrasenya`, `edad`, `rol`, `grupo`, `lib_leido`) VALUES (:mail, :nickname, :nombre, :apellido, :contrasenya, :edad, :rol, :grupo, :lib_leido)');
            // Exekutatu INSERT datuekin
            $miInsert->execute(
            array(
                'mail' => $mail,
                'nickname' => $nick,
                'nombre' => $name,
                'apellido' => $surname,
                'contrasenya' => $pass,
                'edad' => $age,
                'rol' => $rol,
                'grupo' => $group,
                'lib_leido' => $rbook
            )
            );
            $datuak = $miInsert->fetch();
            // Zuzenak badira, saioa hasiko dugu sartutako datuekin
            session_start();
            $_SESSION['mail'] = $_REQUEST['mail'];
            // Orrialde segurura bidaltzen dugu
            header('Location: index.html');
            die();
            }else{
                echo '
                <script>
                document.getElementById("ERROR").innerHTML = "ERROR: Pasahitzak ez dira berdinak.";
                </script>';
            }
            
            }
            if (isset($_POST['login'])) { //egiaztatzen dugu datuak jaso ditugula

                // Aldagaia hauek datu basetik irakurriko ditugu
                $zerbitzaria = "wger1dbvpc1.clfizgthaamq.us-east-1.rds.amazonaws.com";
                $erabiltzailea ="admin";
                $pasahitza = "NausicaA";
                $datubasea = "e1webgune";

                 // Hauek formulariotik hartzen ditugu
                $izena = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
                $pasahitz = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
              

                try {
                    $konexioa = new PDO("mysql:host=$zerbitzaria;dbname=$datubasea", $erabiltzailea, $pasahitza);
                    // ezarri PDO exception modura
                    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // sql 
                    $sql = "SELECT contrasenya FROM Usuarios WHERE nickname= '$izena' ";
                    $emaitza = $konexioa->query($sql);
                    $datuak = $emaitza->fetchAll();
                    if(!isset($datuak)){
                        
                    } 
                    else {
                        error_reporting(0);
                        $pasahitzZuzena = $datuak[0]['contrasenya'];
                        // Sartutako datuak zuzenak diren egiaztatu
                    if ($pasahitzZuzena == $pasahitz) {
                        // Zuzenak badira, saioa hasiko dugu sartutako datuekin
                        session_start();
                        $_SESSION['user'] = $_REQUEST['user'];
                        // Orrialde segurura bidaltzen dugu
                        header('Location: index.html');
                        die();
                    } else {
                        // Datuak zuzenak ez badira, erabiltzaileari jakinarazi
                        echo '<script>
                        document.getElementById("ERROR").innerHTML = "ERROR: Nickname edo pasahitza ez dira berdinak.";
                        </script>';
                    }
                        
                    }
                    
                } catch(PDOException $e) {
                    echo $sql . "<br>" .$e->getMessage();
                }
                
                $konexioa = null;
              
                
               

                
            }
        ?>
    	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" name="R" id="R" action="" onsubmit="return return()">
					<label for="chk" aria-hidden="true">Erregistratu</label>
                    <input type="text" name="mailR" placeholder="mail" required="">
					<input type="text" name="nicknameR" placeholder="Nickname" required="">
					<input type="text" name="name" placeholder="Izena" required="">
                    <input type="text" name="surname" placeholder="Abizena" required="">
                    <input type="text" name="age" placeholder="Adina" required="">
					<input type="password" name="pswdr" placeholder="Pasahitza" required="">
                    <input type="password" name="pswdc" placeholder="Baieztatu pasahitza" required="">
					<p id="ERROR"></p>
                    <button type="submit" name="register" value="Submit">Erregistratu</button>
				</form>
			</div>

			<div class="login">
				<form method="post" name="L" id="L" action="">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="user" placeholder="Nickname" autocomplete="off">
					<input type="password" name="pass" placeholder="Contraseña" autocomplete="off">
					<button type="submit" name="login" value="Submit">Login</button>
                    <button type="submit" name="inv" value="Submit">Erab. Gonbidatua</button>
				</form>
			</div>
	</div>
    <script>
        var return = () => {
            return(false);
        }

        var 
    </script>
    </body>
</html>
