/*Validation des formulaires*/
/*Page ajouter.php*/
function validateForm() {
    var formAdd = document.forms["formAdd"];
    for (let i = 0; i < 11; i++ ){
        var formContant = document.querySelectorAll('.formInput');
        console.log(formContant);
        var formInput = formContant[i];
        console.log(formInput);
        if (formInput.value == ""){
            //Si l'input est vide on ajoute la classe de décor
            formInput.classList.add('emptyInput');
        }else{
            //Si l'input est rempli on supprimer la classe de décor
            formInput.classList.remove('emptyInput');
        }
    }
}
