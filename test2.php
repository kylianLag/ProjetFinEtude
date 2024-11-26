<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir un PDF</title>
    <style>
        /* Styles globaux pour le body */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            color: #333;
        }

        /* Titre de la page */
        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-weight: 600;
            text-align: center;
            letter-spacing: 1px;
        }

        /* Conteneur des cartes PDF */
        .pdf-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        /* Style des cartes contenant les PDF */
        .pdf-card {
            background-color: #fff;
            border-radius: 10px;
            width: 250px;
            height: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .pdf-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .pdf-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .pdf-card .card-info {
            padding: 10px;
            text-align: center;
        }

        .pdf-card .card-info h3 {
            font-size: 1.1rem;
            color: #3498db;
            margin: 10px 0;
        }

        /* Conteneur du PDF sélectionné */
        .pdf-container {
            width: 90%;
            max-width: 1200px;
            height: 80%;
            max-height: 800px;
            border-radius: 15px;
            overflow: hidden;
            margin-top: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: none;
        }

        embed {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Bouton de retour */
        .back-button {
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>

    <h1>Choisissez un PDF à afficher</h1>

    <!-- Liste des PDF sous forme de cartes cliquables -->
    <div class="pdf-list">
        <div class="pdf-card" onclick="showPDF('Cours-1.pdf')">
            <img src="https://via.placeholder.com/250x180.png?text=PDF+1" alt="PDF 1">
            <div class="card-info">
                <h3>Cours 1</h3>
            </div>
        </div>
        <div class="pdf-card" onclick="showPDF('Cours-2.pdf')">
            <img src="https://via.placeholder.com/250x180.png?text=PDF+2" alt="PDF 2">
            <div class="card-info">
                <h3>Cours 2</h3>
            </div>
        </div>
        <div class="pdf-card" onclick="showPDF('Cours-3.pdf')">
            <img src="https://via.placeholder.com/250x180.png?text=PDF+3" alt="PDF 3">
            <div class="card-info">
                <h3>Cours 3</h3>
            </div>
        </div>
    </div>

    <!-- Conteneur pour afficher le PDF sélectionné -->
    <div class="pdf-container" id="pdfContainer">
        <embed src="" id="pdfEmbed" type="application/pdf">
    </div>

    <!-- Bouton retour -->
    <button class="back-button" id="backButton" onclick="goBack()">Retour</button>

    <script>
        // Fonction pour afficher le PDF sélectionné
        function showPDF(pdfFile) {
            document.getElementById('pdfContainer').style.display = 'block';
            document.getElementById('pdfEmbed').src = pdfFile;
            document.getElementById('backButton').style.display = 'block';
            window.scrollTo(0, document.body.scrollHeight); // Scroll vers le PDF
        }

        // Fonction pour revenir à la liste de PDF
        function goBack() {
            document.getElementById('pdfContainer').style.display = 'none';
            document.getElementById('backButton').style.display = 'none';
        }
    </script>

</body>
</html>
