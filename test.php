<form method="post">
        <div class="form-group">
            <label for="matriculeProf">Matricule Prof :</label>
            <input type="text" class="form-control" name="matriculeProf" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="cin">CIN ou Passeport :</label>
            <input type="text" class="form-control" name="cin">
        </div>

        <div class="form-group">
            <label for="identifiantCNRPS">Identifiant CNRPS :</label>
            <input type="text" class="form-control" name="identifiantCNRPS">
        </div>

        <div class="form-group">
            <label for="dateDeNaissance">Date de Naissance :</label>
            <input type="date" class="form-control" name="dateDeNaissance">
        </div>

        <div class="form-group">
            <label for="nationalite">Nationalité :</label>
            <input type="text" class="form-control" name="nationalite">
        </div>

        <div class="form-group">
            <label for="sexeMF">Sexe (M/F) :</label>
            <input type="text" class="form-control" name="sexeMF">
        </div>

        <div class="form-group">
            <label for="dateEntAdm">Date d'Entrée Administratif :</label>
            <input type="date" class="form-control" name="dateEntAdm">
        </div>

        <div class="form-group">
            <label for="dateEntEtbs">Date d'Entrée à l'établissement :</label>
            <input type="date" class="form-control" name="dateEntEtbs">
        </div>

        <!-- Ajouter d'autres champs ici... -->

        <button type="submit" class="btn btn-primary">Ajouter Professeur</button>
    </form>