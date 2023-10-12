$(document).ready(function(){

      //search
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
 
      //print layout code
      $("#btn").click(function () {
          $('.action').hide();
          var printContents = document.getElementById('#printarea').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        $('.action').show();
      });

      //registration fee receipt printing
      $("#btn-fee").click(function () {
        $('.action').hide();
        var printContents = document.getElementById('printareafee').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

      $('.action').show();
    });

      //card print
       //print layout code
       $("#btn-card").click(function () {
        
          var printContents = document.getElementById('card-print').innerHTML;
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = printContents;
          window.resizeTo(480,382);
          window.print();

          document.body.innerHTML = originalContents;

       
    });

      for(var i=2;i<=10000;i++){
        $('.name'+i).hide();
      }
      //perform click
      $('#modal-btn').click();
      //total payment calculation
      $('#btn-calc').click(function(){
        calculateColumn(1,'th');
      });

      $('#btn-calc-fund').click(function(){
        calculateColumn(2,'td');
      });
      
      var txt = $( "#name-select option:selected" ).text();
      if(txt.length > 0)
      {
        $('#name').val(txt);
      }
      $('#name-select').change(function(){
        var txt = $( "#name-select option:selected" ).text();
        $('#name').val(txt);
      });
      //dropdown change
      changeDropDown();

        //alert(txt);
      $("#name").change(function(){
          changeDropDown();
      });

  });

    function changeDropDown() 
    {
        var id = $("#name option:selected").val();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        $.ajax({
          url:'/card/create/'+id,
          method:"GET",
          data:{id:id},
          success: function(data) {
            if(data.length > 0){
              $('#member').val(data[0].name);
              $('#fname').val(data[0].father_name);
              $('#mobile').val(data[0].contact_saudi);
              $('#address').text(data[0].work_address);
              $('#image').val(data[0].pic);
            }else{
              console.log("No data found");
            }
            //console.log(data[0].name);
         
          }
        });
    }

    function calculateColumn(index,col) {
      var total = 0;
      $('#payment-table tr').each(function () {
          var value = parseInt($(col, this).eq(index).text());
          if (!isNaN(value)) {
              total += value;
          }
      });
      //alert(total);
      $('#total').text('Total Amount : ' + total);
  }

  