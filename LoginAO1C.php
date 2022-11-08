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
        //Cookie izenen aldagaiak konstanteak
        $snom = 'sCookie';
        //Cookie existitzen badira hartuko eta hilko ditu
        if (isset($_COOKIE['sCookie'])) {
            setcookie($snom, "KILLER", time()-60);
        }
        //Erregistro aldagaiak, ordenean: Gonbidatua, Erregistroa, Sartu
            if(isset($_POST['inv'])){
                session_start();
                //Saioa hasi eta gero, gordeko ditu zerbitzarian datuak
                $_SESSION['nickname'] = "inv";
                $_SESSION['rol'] = "invitado";
                header('Location: index.php');
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
            $rol = 'invitado';
            $group = '1';
            $rbook = '-';

            include 'dbcon.php';
            if($pass == $passc){
            // Preparatu INSERT
            
            $miInsert = $nirePDO->prepare('INSERT INTO `Usuarios` (`mail`, `nickname`, `nombre`, `apellido`, `contrasenya`, `edad`, `rol`, `grupo`, `lib_leido`) VALUES (:mail, :nickname, :nombre, :apellido, :contrasenya, :edad, :rol, :grupo, :lib_leido)');
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
            //Cookie sorketa
            $eval = $nick;
            //Baloreak sartu eta gero
            //Ezabaketa denbora
            $exp = time() +3600; //Egun 1 +86.400 edo (3600*24), 7 egun +604.800
            //Non gordeko den
            $pth = '/';
            //Sortzeko aldagaiak
            setcookie($rnom, $rval, $exp, $pth);
            // setcookie($enom, $eval, $exp, $pth);
            // Orrialde segurura bidaltzen dugu
            header('Location: index.php');
            die();
            }else{
                echo '<script>
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
                $nick = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
                $pasahitz = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
              

                try {
                    $konexioa = new PDO("mysql:host=$zerbitzaria;dbname=$datubasea", $erabiltzailea, $pasahitza);
                    // ezarri PDO exception modura
                    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // sql 
                    $sql = "SELECT contrasenya FROM Usuarios WHERE nickname= '$nick' ";
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
                        $sqlemail = "SELECT mail FROM Usuarios WHERE nickname = '$nick'";
                        $sqlrol = "SELECT rol FROM Usuarios WHERE nickname = '$nick'";
                        $sqlnom = "SELECT nombre FROM Usuarios WHERE nickname = '$nick'";
                        $sqlape = "SELECT apellido FROM Usuarios WHERE nickname = '$nick'";
                        $sqlage = "SELECT edad FROM Usuarios WHERE nickname = '$nick'";
                        $eemail = $konexioa->query($sqlemail);
                        $demail = $eemail->fetchAll();
                        $erol = $konexioa->query($sqlrol);
                        $drol = $erol->fetchAll();
                        $enom = $konexioa->query($sqlnom);
                        $dnom = $enom->fetchAll();
                        $eape = $konexioa->query($sqlape);
                        $dape = $eape->fetchAll();
                        $eage = $konexioa->query($sqlage);
                        $dage = $eage->fetchAll();
                        $email = $demail[0]['mail'];
                        $rol = $drol[0]['rol'];
                        $nom = $dnom[0]['nombre'];
                        $ape = $dape[0]['apellido'];
                        $age = $dage[0]['edad'];
                        $_SESSION['mail']=$email;
                        $_SESSION['rol']=$rol;
                        $_SESSION['nickname']=$nick;
                        $_SESSION['nombre']=$nom;
                        $_SESSION['apellido']=$ape;
                        $_SESSION['edad']=$age;
                        //Cookie sorketa
                        $sval = $rol;
                        //Baloreak sartu eta gero
                        //Ezabaketa denbora
                        $exp = time() +3600; //Egun 1 +86.400 edo (3600*24), 7 egun +604.800
                        //Non gordeko den
                        $pth = '/';
                        //Sortzeko aldagaiak
                        setcookie($snom, $sval, $exp, $pth);
                        // setcookie($enom, $eval, $exp, $pth);
                        // Orrialde segurura bidaltzen dugu
                        header('Location: index.php');
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
				<form method="post" name="R" id="R" action="">
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
