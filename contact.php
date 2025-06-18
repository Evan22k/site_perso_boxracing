<?php include "header.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <div class="container-fluid container-black">
        <h1>Nous contacter :</h1>
        <hr>
        <h5 class="h5-phrase">Pour toute information ou question de votre part, vous pouvez venir en magasin ou nous appeler au 02 98 80 21 46 aux horaires suivantes :</h5>
        <div class="card card-horaire-contact">
            <div class="horaire-contact">
                <div class="etat-ouverture" id="etat-ouverture">
                    <!-- État de l'ouverture du garage affiché ici -->
                </div>

                <p class="jour">Lundi</p>
                <div class="horaire-ligne">
                    <span>❌ Fermé</span>
                </div>

                <p class="jour">Mardi</p>
                <div class="horaire-ligne">
                    <span>🕗 Matin : 9h00–12h00</span>
                    <span>🕒 Après-midi : 13h30–18h30</span>
                </div>

                <p class="jour">Mercredi</p>
                <div class="horaire-ligne">
                    <span>🕗 Matin : 9h00–12h00</span>
                    <span>🕒 Après-midi : 13h30–18h30</span>
                </div>

                <p class="jour">Jeudi</p>
                <div class="horaire-ligne">
                    <span>🕗 Matin : 9h00–12h00</span>
                    <span>🕒 Après-midi : 13h30–18h30</span>
                </div>

                <p class="jour">Vendredi</p>
                <div class="horaire-ligne">
                    <span>🕗 Matin : 9h00–12h00</span>
                    <span>🕒 Après-midi : 13h30–18h30</span>
                </div>

                <p class="jour">Samedi</p>
                <div class="horaire-ligne">
                    <span>🕗 Matin : 9h00–12h00</span>
                    <span>🕒 Après-midi : 13h30–18h00</span>
                </div>

                <p class="jour">Dimanche</p>
                <div class="horaire-ligne">
                    <span>❌ Fermé</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid container-white">
        <h5 class="h5-phrase">Sinon, vous pouvez nous contacter en remplissant le formulaire ci-dessous (nécessite un compte Google connecté) :</h5>
        <div class="card-body card-body-contact">
            <form id="gmailForm" onsubmit="return sendViaGmail();">
                <div class="form-group">
                    <label for="objet" class="label-mail">Objet :</label>
                    <input type="text" class="form-control" id="objet" required>
                </div>
                <div class="form-group">
                    <label for="message" class="label-mail">Message :</label>
                    <textarea class="form-control" id="message" rows="6" required></textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="button pourpre">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>

<?php include "footer.php" ?>