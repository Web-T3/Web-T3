<html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/LR.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="JS/scriptL.js"></script>
    <title>Register-Login</title>
    </head>
    <body>
        <?php
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
            $mail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : null;
            $nick = isset($_REQUEST['nickname']) ? $_REQUEST['nickname'] : null;
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
            $pass = isset($_REQUEST['pswdr']) ? $_REQUEST['pswdr'] : null;
            $passc = isset($_REQUEST['pswdc']) ? $_REQUEST['pswdc'] : null;
            $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : null;
            $rol = 'invitado';
            $group = '1';

            include 'dbcon.php';
            if($pass == $passc){
          
            // Preparatu INSERT
            $miInsert = $nirePDO->prepare('INSERT INTO `Usuarios` (`mail`, `nickname`, `nombre`, `apellido`, `contrasenya`, `edad`, `rol`, `grupo`) VALUES (:mail, :nickname, :nombre, :apellido, :contrasenya, :edad, :rol, :grupo)');
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
                'grupo' => $group
            )
            );
            $datuak = $miInsert->fetch();
            // Zuzenak badira, saioa hasiko dugu sartutako datuekin
            session_start();
            $_SESSION['nickname'] = $_REQUEST['nickname'];
            $_SESSION['nombre'] = $_REQUEST['name'];
            $_SESSION['apellido'] = $_REQUEST['apellido'];
            $_SESSION['edad'] = $_REQUEST['edad'];
            $_SESSION['rol'] = $rol;
            $_SESSION['mail'] = $_REQUEST['mail'];
            $email = $_SESSION['mail'];
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

                // Datu basera konektatu
                include "dbcon.php";
                 // Hauek formulariotik hartzen ditugu
                $nick = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
                $pasahitz = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
              

                try {
                    $konexioa = new PDO("mysql:host=$hostDB;dbname=$nombreDB", $usuarioDB, $contrasenyaDB);
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
                <form method="post" name="R" id="R">
                    <label for="chk" aria-hidden="true">Register</label>
                    
                    <!-- Email -->
                    <div class="row">
                        <input type="text" id="email" name="mail" pattern="\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$" placeholder="Email" required>
                        <span class="error" id="emailError"></span>
                    </div>

                    <!-- Nickname -->
                    <div class="row">
                        <input type="text" id="nick" name="nickname" pattern="[a-zA-Z0-9]+$" placeholder="Nickname" required>
                        <span class="error" id="nickError"></span>
                    </div>

                    <!-- Nombre -->
                    <div class="row">
                        <input type="text" id="name" name="name" pattern="[a-zA-Z]+$" placeholder="Izena" required>
                        <span class="error" id="nameError"></span>
                    </div>

                    <!-- Apellido -->
                    <div class="row">
                        <input type="text" id="surname" name="surname" pattern="[a-zA-Z]+$" placeholder="Abizena" required>
                        <span class="error" id="surnameError"></span>
                    </div>

                    <!-- Edad -->
                    <div class="row">
                        <input type="text" id="age" name="age" pattern="[0-9]{1,3}" placeholder="Adina" required>
                        <span class="error" id="ageError"></span>
                    </div>

                    <!-- Contraseña -->
                    <div class="row">
                        <input type="password" id="pass" name="pswdr" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Pasahitza" required>
                        <span class="error" id="passError"></span>
                    </div>

                    <!-- Confirmar contraseña -->
                    <div class="row">
                        <input type="password" id="passC" name="pswdc" placeholder="Berriro pasahitza" required>
                    </div>
                    <span class="error" id="passCError"></span>
                    
                    <!-- Boton enviar -->
                    <button type="submit" name="register" value="Submit">Register</button>
                </form>
            </div>

            <div class="login">
                <form method="post" name="L" id="L" action="">
                    <label for="chk" aria-hidden="true">Login</label>
                    <div class="row">
                        <input type="text" name="user" placeholder="Nickname" autocomplete="off">
                    </div>
                    
                    <div class="row">
                        <input type="password" name="pass" placeholder="Pasahitza" autocomplete="off">
                    </div>
                    <button type="submit" name="login" value="Submit">Login</button>
                    <button type="submit" name="inv" value="Submit">Gonbidatua</button>
                </form>
            </div>
    </div>
    </script>
    </body>
</html>
