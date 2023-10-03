/* Entrada no Banco de Dados */
$('#idcadastro').submit(function(){
      $.ajax({
        type: 'POST',
        url: '../PHP/cadastro.php',
        data: $(this).serialize(),
        success: function(data)
        {   
            alert(data);
        }
      });
    return false;
});