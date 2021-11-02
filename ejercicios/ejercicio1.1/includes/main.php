<main>
    <section class="container cuerpo text-center">

        <?php echo validez($errores); ?>

        <?php 
        
            if(isset($_POST["submit"]) && count($errores) == 0){
                calculaRaiz();
            } 
        
        ?>

        <h3 id="titulo">Raíz Cuadrada de un Polinomio</h3>
        <br>

        <form action="" method="POST">

            <label for="coeficiente1">
                Coeficiente A:
                <input type="text" name="coeficiente1" class="form-control" 
                    <?php
                        if(isset($_POST["coeficiente1"])){
                            echo "value='{$_POST["coeficiente1"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "coeficiente1"); ?>
            </label>
            <br><br>

            <label for="coeficiente2">
                Coeficiente B:
                <input type="text" name="coeficiente2" class="form-control"
                    <?php
                        if(isset($_POST["coeficiente2"])){
                            echo "value='{$_POST["coeficiente2"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "coeficiente2"); ?>
            </label>
            <br><br>

            <label for="coeficiente3">
                Coeficiente C:
                <input type="text" name="coeficiente3" class="form-control"
                    <?php
                        if(isset($_POST["coeficiente3"])){
                            echo "value='{$_POST["coeficiente3"]}'";
                        }
                    ?>
                />
                <?php echo mostrarError($errores, "coeficiente3"); ?>
            </label>
            <br><br>

            <input type="submit" value="Calcular" name="submit" class="btn btn-success" />

        </form>

    </section>
</main>