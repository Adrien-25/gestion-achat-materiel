/*Validation des formulaires*/
console.log('START');
/*Page ajouter.php et modifier.php*/

var formAdd = document.forms["formAdd"];
var formAddId = document.getElementById('formAdd');

var formEdit = document.forms["formEdit"];
var formEditId = document.getElementById('formEdit');

var form = '';
test = 0
if (undefined != formAdd) {
    form = formAddId;
    test = 1;
} else if (undefined != formEdit) {
    form = formEditId;
    test = 2;
}
if (test == 1 || test == 2) {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        var submitTest = 1;
        /*ADRESSE*/
        var adresseInput = document.getElementById('adresse');
        var adresse = adresseInput.value;
        /*URL*/
        var urlInput = document.getElementById('url');
        var url = urlInput.value;
        /*NOM*/
        var nomInput = document.getElementById('nom');
        var nom = nomInput.value;
        /*REFERENCE*/
        var referenceInput = document.getElementById('reference');
        var reference = referenceInput.value;
        /*CATEGORIE*/
        var categorieInput = document.getElementById('categorie');
        var categorie = categorieInput.value;
        /*DATE D ACHAT*/
        var date_achatInput = document.getElementById('date_achat');
        var date_achat = date_achatInput.value;
        /*DATE DE FIN DE GARANTIE*/
        var date_fin_garantieInput = document.getElementById('date_fin_garantie');
        var date_fin_garantie = date_fin_garantieInput.value;
        /*PRIX*/
        var prixInput = document.getElementById('prix');
        var prix = prixInput.value;
        /*CONSEIL ENTRETIEN*/
        var conseil_entretienInput = document.getElementById('conseil_entretien');
        var conseil_entretien = conseil_entretienInput.value;
        /*TICKET ACHAT*/
        var ticket_achatInput = document.getElementById('ticket_achat');
        var ticket_achat = ticket_achatInput.value;
        /*MANUEL*/
        var manuelInput = document.getElementById('manuel');
        var manuel = manuelInput.value;

        /*Lieux d'achat */
        var adresseRadio = document.getElementById('adresse_radio');
        var urlRadio = document.getElementById('url_radio');

        if (adresseRadio.checked && adresse == "") {
            adresseInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            adresseInput.classList.remove('emptyInput');
        }
        if (urlRadio.checked && url == "") {
            urlInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            urlInput.classList.remove('emptyInput');
        }
        if (nom == "") {
            nomInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            nomInput.classList.remove('emptyInput');
        }
        if (reference == "") {
            referenceInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            referenceInput.classList.remove('emptyInput');
        }
        if (categorie == "") {
            categorieInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            categorieInput.classList.remove('emptyInput');
        }
        if (date_achat == "" || date_achat > date_fin_garantie) {
            date_achatInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            date_achatInput.classList.remove('emptyInput');
        }
        if (date_fin_garantie == "" || date_achat > date_fin_garantie) {
            date_fin_garantieInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            date_fin_garantieInput.classList.remove('emptyInput');
        }
        if ((prix == "") || (isNaN(prix) == true)) {
            prixInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            prixInput.classList.remove('emptyInput');
        }
        if (conseil_entretien == "") {
            conseil_entretienInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            conseil_entretienInput.classList.remove('emptyInput');
        }
        if ((ticket_achat == "") && (test == 1)) {
            ticket_achatInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            ticket_achatInput.classList.remove('emptyInput');
        }
        if ((manuel == "") && (test == 1)) {
            manuelInput.classList.add('emptyInput');
            submitTest = 0;
        } else {
            manuelInput.classList.remove('emptyInput');
        }
        if (submitTest == 1) {
            form.submit();
        }

    });
}
/* Page graphique.php */
//bar chart
var ctx = document.getElementById("graphDepense");
DepenseTabNbr = [];
if (ctx) {
    document.addEventListener('DOMContentLoaded', function () {
            var graphiqueDonnee = ctx.dataset.graphique;
            const DepenseTab = graphiqueDonnee.split('|');
            var elementsSupprimes = DepenseTab.splice(0, 1);
            var DepenseTabNbr = DepenseTab.map(Number);
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'bar',
                defaultFontFamily: 'Poppins',
                data: {
                    labels: ["Loisirs", "Vêtements", "Multimédia", "jeux & jouets", "Vélos", "Téléphonie", "Electroménager", "Bricolage", "Maison", "Mode", "Autres"],
                    datasets: [{
                        label: "Les dépenses",
                        data: DepenseTabNbr,
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 123, 255, 0.5)",
                        fontFamily: "Poppins"
                    }]
                },
                options: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        
    });
}

