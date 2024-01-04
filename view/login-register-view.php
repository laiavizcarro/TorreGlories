<section class="container mt-70">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="p-3">
                <h4>Inici sessió</h4>
                <form class="tg-form" action="<?= url ?>/index.php?controller=User&action=login" method="POST">
                    <input type="text" name="email" placeholder="Adreça electrònica *">
                    <input type="password" name="password" placeholder="Contrasenya *">
                    <button type="submit" value="Submit" class="submit-button bold mt-20">Iniciar sessió</button>
                </form>

                <p class="error">
                    <?php echo isset($error_login) ? $error_login : "" ?>
                </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="p-3">
                <h4>Registre</h4>
                <form class="tg-form" action="<?= url ?>/index.php?controller=User&action=register" method="POST">
                    <input type="text" name="name" placeholder="Nom *" required>
                    <input type="text" name="surname" placeholder="Cognoms *" required>
                    <input type="text" name="email" placeholder="Adreça electrònica *" required 
                        pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                    <input type="text" name="phone_number" placeholder="Telefon *" required 
                        pattern="^[\d]{9}$">

                    <input type="password" name="password" placeholder="Contrasenya *" required>
                    <input type="password" name="password_check" placeholder="Repetir la contrasenya *" required>
                    <button type="submit" value="submit" class="submit-button bold mt-20">Registrar-se</button>
                </form>

                <p class="error">
                    <?php echo isset($error) ? $error : "" ?>
                </p>
            </div> 
        </div>
    </div>
</section>
