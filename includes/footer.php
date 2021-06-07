

        
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../assets/js/search_anuncio.js"></script>
    <script>
      jQuery(function($){
        $("#cep").mask("00000-000");
        $("#valor").mask('#.##0,00', {reverse: true});
        $("#telefone").mask("(99) 99999-9999");
        $("#wpp").mask("(99) 99999-9999");
    
      });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    

  </body>
</html>