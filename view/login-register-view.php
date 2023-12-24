<section class="container mt-70">
    <div class="row g-4">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="p-3">
                <h4>Inici sessió</h4>
                <form action="">
                    <input type="text" name="email" class="login m-2" placeholder="Adreça electrònica *">
                    <input type="password" name="password" class="login m-2" placeholder="Contrasenya *">
                </form>
                <button type="submit" form="" value="Submit" class="submit-button bold mt-20">Iniciar sessió</button>
            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="p-3">
                <h4>Registre</h4>
                <form action="<?= url ?>/index.php?controller=User&action=register" method="POST">
                    <input type="text" name="name" class="register m-2" placeholder="Nom *" required>
                    <input type="text" name="surname" class="register m-2" placeholder="Cognoms *" required>
                    <input type="text" name="email" class="register m-2" placeholder="Adreça electrònica *" required 
                        pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                    <input type="text" name="phone_number" class="register m-2" placeholder="Telefon *" required 
                        pattern="^[\d]{9}$">

                    <input type="password" name="password" class="register m-2" placeholder="Contrasenya *" required>
                    <input type="password" name="password_check" class="register m-2" placeholder="Repeteix la contrasenya *" required>
                    <button type="submit" value="submit" class="submit-button bold mt-20">Registrar-se</button>
                </form>

                <p class="error">
                    <?php echo isset($error) ? $error : "" ?>
                </p>
            </div> 
        </div>
    </div>
</section>
