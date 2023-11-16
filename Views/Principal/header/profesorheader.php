
<header>
            <nav class="navbar">
                <a href="?menu=inicio" id="textlogo">MarcAutoescuelas<img src="../../Assets/img/l.png" id="logo"></img></a> 
                <div class="navlinks">
                <ul>
                    <li><a href="?menu=inicio" class="onthis">Inicio</a></li>
                    <li><a href="?menu=tests" class="onthis">Tests</a></li>
                    <li><a href="?menu=panelexamenes">Gestionar Examenes</a></li>

                </ul>
                <ul class="usuarionav" id="dropdown">
                <p id="textousuarionav"><img src="../../Assets/img/user.png" id="logo"> Bienvenido, <?php $nombreusuario = Login::nombreusuariolog(); echo $nombreusuario ?></p>

                    <li class="dropdown-content">

                    <form action="index.php?menu=logout" method="post" class="centrarinicio">

                        <input type="submit" value="Cerrar Sesión" name="btnlogout" id="btnlogout">

                    </form>

                    </li>
                    
                    
                    
    
                
                </ul>
                </div>
            </nav> 
        </header>


