//pour actualiser le prix et le prix total quand on change l'article
$(document).ready(function(){

  $('#select_client').on('change', function(){
    var idee = $('#select_client').val();
    var quantite = $('#col_quantite').val();
    // console.log(idee);
    // console.log(quantite);

    $.ajax({
       url : 'getprice.php', // La ressource ciblée
       type : 'POST',
       data : {iday:idee},

     }).done(function(data){
      $('#col_prix').html(JSON.parse(data).prix_article);//json.parse() transforme le json en objet 
      $('#col_prixtotal').html((JSON.parse(data).prix_article)*quantite);
     })
  })
})


//pour actualiser le prix total quand on change la quantité
$(document).ready(function(){

  $('#col_quantite').on('change', function(){
    var idee = $('#select_client').val();
    var quantite = $('#col_quantite').val();

    $.ajax({
       url : 'getprice.php',
       type : 'POST',
       data : {iday:idee},

     }).done(function(data){
      $('#col_prixtotal').html((JSON.parse(data).prix_article)*quantite);
     })
  })
})

//pour ajouter des articles à la liste
$(document).ready(function(){

  $('#addArticle').on('click', function(){
    var ideejs = $('#select_client').val();
    var prixjs = $('#col_prix').text();
    var quantitejs = $('#col_quantite').val();
    var prixTotaljs = $('#col_prixtotal').text();
    // console.log(prixjs);
    $.ajax({
       url : 'addarticle.php',
       type : 'POST',
       data : {iday:ideejs, prixphp:prixjs, quantitephp:quantitejs, prixTotalphp:prixTotaljs},

     }).done(function(data){
      $('#ligne_ajout').html(data);
     })
  })
})
