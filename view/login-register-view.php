<section class="container mt-70">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="p-3">
                <h2>Inici sessió</h2>
                <form class="tg-form row g-3" action="<?= url ?>/index.php?controller=User&action=login" method="POST">
                    <div class="col-12">
                        <label for="email" class="form-label">Correu</label>
                        <input type="text" id="email" name="email" class="form-control mw-250">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Contrasenya</label>
                        <input type="password" id="password" name="password" class="form-control mw-250">
                    </div>
                    <div class="col-12">
                        <button type="submit" value="Submit" class="btn-submit fw-bold mt-20">Iniciar sessió</button>
                    </div>
                </form>

                <p class="error">
                    <?php echo isset($error_login) ? $error_login : "" ?>
                </p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="p-3">
                <h2>Registre</h2>
                <form class="tg-form row g-3" action="<?= url ?>/index.php?controller=User&action=register" method="POST">
                    <div class="col-md-3">   
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-3">   
                        <label for="surname" class="form-label">Cognoms</label>
                        <input type="text" id="surname" name="surname" class="form-control" required>
                    </div>

                    <div class="col-md-3">   
                        <label for="email" class="form-label">Correu</label>
                        <input type="text" id="email" name="email" class="form-control" required 
                        pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                    </div>
                    
                    <div class="col-md-3">   
                        <label for="phone_number" class="form-label">Telefon</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" required 
                        pattern="^[\d]{9}$">
                    </div>
                    
                    <div class="col-md-3"> 
                        <label for="password" class="form-label">Contrasenya</label>
                        <input type="password" id="password" name="password" class="form-control" required>

                    </div>

                    <div class="col-md-3"> 
                        <label for="password_check" class="form-label">Contrasenya</label>
                        <input type="password" id="password_check" name="password_check" class="form-control" required>
                    </div>

                    <div class="col-md-12"> 
                        <button type="submit" value="submit" class="btn-submit fw-bold mt-20">Registrar-se</button>
                    </div>
                </form>

                <p class="error">
                    <?php echo isset($error) ? $error : "" ?>
                </p>
            </div> 
        </div>
    </div>
</section>
