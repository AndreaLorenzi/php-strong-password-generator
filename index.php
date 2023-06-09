<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <title>generatore di password</title>
</head>

<body>

    <body>
        <div class="container" ">
        <h1 class=" text-center" style="color:#85878B">Strong Password Generator</h1>
            <h2 class="text-center">Genera una password sicura</h2>

            <form action="index.php" method="GET">
                <div class="form-group d-flex">
                    <label for="length"> lunghezza password:</label>
                    <input type="number" id="length" name="length" class="form-control" min="1" max="100" required>
                </div>
                <div class="form-group d-flex justify-content-between my-2">
                    <label for="characters">Caratteri:</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="characters[]" value="letters" id="letters">
                            <label class="form-check-label" for="letters">
                                Lettere (minuscole e maiuscole)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="characters[]" value="numbers" id="numbers">
                            <label class="form-check-label" for="numbers">
                                Numeri
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="characters[]" value="symbols" id="symbols">
                            <label class="form-check-label" for="symbols">
                                Simboli
                            </label>
                        </div>

                    </div>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <label for="repetition">Ripetizione caratteri:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="repetition" id="repetition" value="true">
                        <label class="form-check-label" for="repetition" style="padding-right: 5.5rem;">
                            Consenti ripetizione
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Genera password</button>
            </form>

            <?php
            include 'functions.php';
            if (isset($_GET['length'])) {
                $passwordLength = $_GET['length'];
                $characters = $_GET['characters'];
                $allowRepetition = isset($_GET['repetition']) ? true : false;
                $password = generatePassword($passwordLength, $characters, $allowRepetition);
                echo "<h2>La tua password generata:</h2>";
                echo "<textarea>$password</textarea>";
            }
            ?>

        </div>
    </body>

</html>