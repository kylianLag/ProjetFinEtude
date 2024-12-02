<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS externe -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
</head>
<body>

    <!-- Première année -->
    <div class="category">
        <h2>Première année</h2>
        <div class="pdf-list">
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-1.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+1" id="pdfCover1" class="pdf-cover" alt="PDF 1">
                <div class="card-info">
                    <h3>Cours 1 : Présentation globale</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-2.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+2" id="pdfCover2" class="pdf-cover" alt="PDF 2">
                <div class="card-info">
                    <h3>Cours 2: Les risques et menaces</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-3.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+3" id="pdfCover3" class="pdf-cover" alt="PDF 3">
                <div class="card-info">
                    <h3>Cours 3: La cryptographie</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-4.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+4" id="pdfCover4" class="pdf-cover" alt="PDF 4">
                <div class="card-info">
                    <h3>Cours 4: La protection des données personnelles</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-5.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+5" id="pdfCover5" class="pdf-cover" alt="PDF 5">
                <div class="card-info">
                    <h3>Cours 5: La fonction de hachage</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-6.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+6" id="pdfCover6" class="pdf-cover" alt="PDF 6">
                <div class="card-info">
                    <h3>Cours 6: La blockchain</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions1er/1-Cours-7.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+7" id="pdfCover7" class="pdf-cover" alt="PDF 7">
                <div class="card-info">
                    <h3>Cours 7: Contrôle d’accès et gestion des identités</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Deuxième année -->
    <div class="category">
        <h2>Deuxième année</h2>
        <div class="pdf-list">
            <div class="pdf-card" onclick="showPDF('FichesRévisions2e/2-Cours-1.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+8" id="pdfCover8" class="pdf-cover" alt="PDF 8">
                <div class="card-info">
                    <h3>Cours 1: La protection des applications web</h3>
                </div>
            </div>
            <div class="pdf-card" onclick="showPDF('FichesRévisions2e/2-Cours-2.pdf')">
                <img src="https://via.placeholder.com/250x180.png?text=PDF+9" id="pdfCover9" class="pdf-cover" alt="PDF 9">
                <div class="card-info">
                    <h3>Cours 2: Pourquoi les injections SQL existent-elles toujours ?</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteneur pour afficher le PDF sélectionné -->
    <div class="pdf-container" id="pdfContainer" onclick="closePDF(event)">
        <embed src="" id="pdfEmbed" type="application/pdf">
    </div>

    <script>
        // Fonction pour afficher le PDF sélectionné
        function showPDF(pdfFile) {
            document.getElementById('pdfContainer').style.display = 'flex';
            document.getElementById('pdfEmbed').src = pdfFile;
            window.scrollTo(0, 0); // Scroll vers le haut de la page pour voir le PDF
        }

        // Fonction pour fermer le PDF si on clique à l'extérieur de l'embed
        function closePDF(event) {
            if (event.target === document.getElementById('pdfContainer')) {
                document.getElementById('pdfContainer').style.display = 'none';
            }
        }

        // Fonction pour charger et afficher la couverture d'un PDF
        function loadPDFCover(pdfUrl, coverId) {
            pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    var scale = 1.0; // Échelle de la couverture
                    var viewport = page.getViewport({ scale: scale });
                    var canvas = document.createElement("canvas");
                    var context = canvas.getContext("2d");
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Rendre la page sur le canvas
                    page.render({ canvasContext: context, viewport: viewport }).promise.then(function() {
                        var img = canvas.toDataURL(); // Convertir le canvas en image
                        document.getElementById(coverId).src = img; // Afficher l'image dans la carte
                    });
                });
            });
        }

        // Charger les couvertures des PDF au chargement de la page
        window.onload = function() {
            loadPDFCover('FichesRévisions1er/1-Cours-1.pdf', 'pdfCover1');
            loadPDFCover('FichesRévisions1er/1-Cours-2.pdf', 'pdfCover2');
            loadPDFCover('FichesRévisions1er/1-Cours-3.pdf', 'pdfCover3');
            loadPDFCover('FichesRévisions1er/1-Cours-4.pdf', 'pdfCover4');
            loadPDFCover('FichesRévisions1er/1-Cours-5.pdf', 'pdfCover5');
            loadPDFCover('FichesRévisions1er/1-Cours-6.pdf', 'pdfCover6');
            loadPDFCover('FichesRévisions1er/1-Cours-7.pdf', 'pdfCover7');
            
            loadPDFCover('FichesRévisions2e/2-Cours-1.pdf', 'pdfCover8');
            loadPDFCover('FichesRévisions2e/2-Cours-2.pdf', 'pdfCover9');
        };
    </script>

</body>
</html>
