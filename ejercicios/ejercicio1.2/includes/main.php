<main>
    <section class="container cuerpo text-center">

        <?php echo validez($errores); ?>

        <?php 
        
            if(isset($_POST["submit"]) && count($errores) == 0){
                muestraFormulario();
            } 
        
        ?>

        <h3 id="titulo">Datos de Usuario</h3>
        <br>
        <!-- Formulario HTML -->
        <form action="" method="POST">

            <label for="nif">
                NIF:
                <input type="text" name="nif" class="form-control" 
                    <?php
                        if(isset($_POST["nif"])){
                            echo "value='{$_POST["nif"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "nif"); ?>
            </label>
            <br><br>

            <label for="nombre">
                Nombre:
                <input type="text" name="nombre" class="form-control" 
                    <?php
                        if(isset($_POST["nombre"])){
                            echo "value='{$_POST["nombre"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "nombre"); ?>
            </label>
            <br><br>

            <label for="apellidos">
                Apellidos:
                <input type="text" name="apellidos" class="form-control"
                    <?php
                        if(isset($_POST["apellidos"])){
                            echo "value='{$_POST["apellidos"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "apellidos"); ?>
            </label>
            <br><br>

            <label for="fecha">
                Fecha de Nacimiento:
                <input type="text" name="fecha" class="form-control"
                    <?php
                        if(isset($_POST["fecha"])){
                            echo "value='{$_POST["fecha"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "fecha"); ?>
            </label>
            <br><br>

            <label for="email">
                E-mail:
                <input type="email" name="email" class="form-control"
                    <?php
                        if(isset($_POST["email"])){
                            echo "value='{$_POST["email"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "email"); ?>
            </label>
            <br><br>

            <label for="password">
                Contraseña:
                <input type="password" name="password" class="form-control"
                    <?php
                        if(isset($_POST["password"])){
                            echo "value='{$_POST["password"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "password"); ?>
            </label>
            <br><br>

            <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

        </form>

    </section>
</main>