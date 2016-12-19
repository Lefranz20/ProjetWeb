$(document).ready(function(){
   // RechercheLocaliteByCodePostal();
});


function RechercheLocaliteByCodePostal()
{
    $('#appbundle_utilisateur_codePostal').on('change', function () {
        var CodePostalId = $(this).val();
        CodePostalId = $.trim(CodePostalId);
        //alert(CodePostalId);
        $.post("http://localhost:8000/utilisateur/localite", {CodePostalId: CodePostalId}, function (datas) {
//        var data = JSON.parse(datas);
            // alert(datas);
            /*         $('#appbundle_utilisateur_localite').html('<option>-- Liste des codes Postaux --</option>');
             $('#appbundle_utilisateur_localite').append('<option value="Bruge">Bruge</option>')
             $('#appbundle_utilisateur_localite').selectpicker();*/
            return $('#appbundle_utilisateur_localite').html('<option>-- Liste des codes Postaux --</option>')
                .append('<option value="Bruge">Bruge</option>')
                .selectpicker();
        });
    });
}
function ResultatRecherche()
{
    $('#searchResult').on('show.bs.modal', function (event) {
        var  prestataire = $('input[name="prestataire"]').val();
        var  localite = $('input[name="localite"]').val();
        var  services = $('input[name="catServices"]').val();
    alert('ok');
        $.post("http://localhost:8000/search-result", {prestataire: prestataire, localite:localite, catServices:services}, function (datas) {
            //alert(datas);
            console.log(datas);
            //console.log(datas['description']);
            $.each(datas, function(cle , ArrayData){
                //console.log(ArrayData);
/*                console.log(ArrayData['id']);
                console.log(ArrayData['description']);*/
                $.each(ArrayData['categorieService'], function(key, value){
                    console.log(value['nom']);
                });
            });
        });
        var modal = $(this);
        return modal.find('.modal-body').append('<p>FRANCOIS</p>');


    })
}


