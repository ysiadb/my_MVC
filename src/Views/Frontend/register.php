<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>Prénom</label>
        <input type="text" name="firstname" required />
    </div>
    <div class="form-element">
        <label>Nom</label>
        <input type="text" name="lastname" required />
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label>Pseudo</label>
        <input type="text" name="pseudo" required />
    </div>
    <div class="form-element">
        <label>Mot de passe</label>
        <input type="password" name="pw" required />
    </div>
    <div class="form-element">
        <label>Admin ?</label>
        <input type="checkbox" name="admin" value="yes"/>
    </div>
    <button type="submit" name="register" value="register">S'inscrire</button>
</form>