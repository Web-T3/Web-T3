<!-- Header -->
<header>
        <img src="Multimedia/logo.png" alt="Logo" class="logo" onclick="location='index.php'">
        <div class="rightSide">
            <div class="dropdown">
                <button class='fa fa-filter filtros' style="font-size:35px; color:black">
                    <form class="dropdown-content">
                        
                        <a href="index.php?filtro=Gotica">Gotica</a>
                        <a href="index.php?filtro=Aventura">Aventura</a>
                        <a href="index.php?filtro=Terror">Terror</a>
                        <a href="index.php?filtro=Accion">Acción</a>
                        <a href="index.php?filtro=Misterio">Misterio</a>
                    
                  
                        <a href="index.php?filtro=Deporte">Deporte</a>
                        <a href="index.php?filtro=Comedia">Comedia</a>
                        <a href="index.php?filtro=Policiaca">Policiaca</a>
                        <a href="index.php?filtro=Ciencia Ficcion">Ciencia Ficción</a>
                        <a href="index.php?filtro=Fantastica">Fantastica</a>
                  
                   
                        <a href="index.php?filtro=Biografia">Biografia</a>
                        <a href="index.php?filtro=Autobiografia">Autobiografia</a>
                        <a href="index.php?filtro=Historico">Historico</a>
                        <a href="index.php?filtro=Distopica">Distopica</a>
                        <a href="index.php?filtro=Paranormal">Paranormal</a>
             
                    </form>
            </div>
            </button>
           
            <form class='search'>
            <input type='text' name='search' id='searchInput' placeholder='Bilatu' autocomplete='off'>
            <img src='Multimedia/lupa.png' class='lupa'>
            </form>
           
            <div class="dropdown">
                <img src="Multimedia/no-profile.jpg" alt="" class="profile">
                <div class="dropdown-content">
                <?php
                       if ($_SESSION['rol'] == "invitado" || $_SESSION['rol'] == "") {
                        if ($_SESSION['rol'] == "") {
                            echo '<p>inv</p>';
                            echo '<a href="LoginAO1C.php">Erregistratu edo saioa hasi</a>';
                        } else {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="LoginAO1C.php">Erregistratu edo saioa hasi</a>';
                        }
                    } else if ($_SESSION['rol'] == "irakaslea") {
                        echo '<p>'.$_SESSION['nickname'].'</p>';
                        echo '<a href="addLibro.php">Bidali liburu berria</a>';
                        echo '<a href="miFicha.php">Zure fitxa</a>';
                        echo '<a href="miPerfil.php">Profila</a>';
                        echo '<a href="admin.html">Admin</a>';
                        echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                    } else if ($_SESSION['rol'] == "ikaslea") {
                        echo '<p>'.$_SESSION['nickname'].'</p>';
                        echo '<a href="addLibro.php">Bidali liburu berria</a>';
                        echo '<a href="miFicha.php">Zure fitxa</a>';
                        echo '<a href="miPerfil.php">Profila</a>';
                        echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                    } else if ($_SESSION['rol'] == "admin") {
                        echo '<p>'.$_SESSION['nickname'].'</p>';
                        echo '<a href="addLibro.php">Bidali liburu berria</a>';
                        echo '<a href="miFicha.php">Zure fitxa</a>';
                        echo '<a href="miPerfil.php">Profila</a>';
                        echo '<a href="admin.html">Admin</a>';
                        echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>