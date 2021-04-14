$(document).ready(function(){


  $("#myform").submit(function(event){
    console.log("test");
    event.preventDefault();

    $.ajax({
         url: 'controller/gestionclasses.php',
         data: {op:'',idfilier: $("#codefil").val()},
         type: 'POST',
         success: function (data, textStatus, jqXHR) {
             if(data.length != 0){
               get_classes_by_IDFILIERE(data);
             }else{
               $('#table-content').html("");
             }
         },
         error: function (jqXHR, textStatus, errorThrown) {
             console.log(textStatus);
         }
     });

  });

});

function get_classes_by_IDFILIERE(data){
  console.log(data[0].cfil);
  var contenu = $('#table-content');
  var ligne = "";

  for (i = 0; i < data.length; i++) {
      ligne += '<tr><td>' + data[i].id + '</td>';
      ligne += '<td>' + data[i].code + '</td>';
      ligne += '<td>' +  data[i].cfil + '</td></tr>';
  }
  contenu.html(ligne);
}
