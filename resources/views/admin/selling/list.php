<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div id="notifyDiv" class="d-flex justify-content-center display"></div>
  <form action="" method="POST">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="d-flex justify-content-center">Selling Page </h3> <br> <br>
      </div>
      <div class="box-body">
        <div class="form-group">
          item
          <input type="text" id="itemName" name="itemName" class="form-control">
        </div>
      </div>

    </div>
    <br>
    <table class="table table-bordered table-hover">
      <thead>
        <th>No</th>
        <th>Product Name</th>
        <th>Quantity</th>

        <th><input type="button" value="+" id="add" class="btnbtn-primary"></th>
      </thead>
      <tbody class="detail">

      </tbody>
      <tfoot>
        <th></th>
        <th></th>
        <th></th>

      </tfoot>

    </table>
  
       <form method="POST" action="admin/selling/show">
          <button>show </button>


          </form>

       
      

</body>
<script src=" //code.jquery.com/jquery-1.12.0.min.js"></script>
<script src=" //code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
   
    var checkArray = [];
    var total_price = 0;
    $('#itemName').keypress(function(event) {
      if (event.keyCode == 13) {
        event.preventDefault();
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (checkArray.hasOwnProperty($('#itemName').val(), checkArray)) {
          var totalQuantity = parseInt(checkArray[$('#itemName').val()]);
          var quantity = parseInt($("#q_" + $('#itemName').val()).val());
          if (totalQuantity > quantity) {
            $("#q_" + $('#itemName').val()).val(parseInt($("#q_" + $('#itemName').val()).val()) + 1);
            $('#itemName').val('');
          } else {
            $('#itemName').val('');
            $('#notifyDiv').fadeIn();
            $('#notifyDiv').css('background', 'orange');
            $('#notifyDiv').text('out of stock');
            setTimeout(() => {
              $('#notifyDiv').fadeOut();
            }, 3000);
          }
        } else {
          var arr = {};
          arr['itemName'] = $('#itemName').val();
          $.ajax({
            method: 'POST',
            url: '/api/items/search',
            data: arr,
            success: function(response) {
              let data = JSON.parse(response);
              if (data.result.data[0].quantity > 0) {
                checkArray[$('#itemName').val()] = data.result.data[0].quantity;
                var id = data.result.data[0].id;
                var productname = data.result.data[0].name;
                var quantity = data.result.data[0].quantity;

                var row = `<tr><td> ${productname} </td></tr>`;
                var row = `<tr><td> ${quantity} </td></tr>`;
                var row = `<tr>
                        <td><input type="text" class="form-control productname" value = "${id}" name="productid[]"></td>
                        <td><input type="text" class="form-control productname" value = "${productname}" name="productname[]"></td>
                        <td><input type="text" class="form-control quantity"  value ="${quantity}" value = "" name="quantity[]"></td>

                        <td><a href="#" class="remove">Delete</td>
                        </tr>`;


                $('tbody').append(row);
                $('#itemName').val('');

                displaySuccssesMessage();
              } else {
                displayErrorMessage();
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              alert("Status: " + textStatus);
              alert("Error: " + errorThrown);
            }
          });
        }
      }
    });

    $("form").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        method: 'POST',
        url: '/admin/transactions/store',
        data: $("form").serializeArray(),
        success: function(response) {
          console.log(response);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          alert("Status: " + textStatus);
          alert("Error: " + errorThrown);
        }
      });
    });

    function displaySuccssesMessage() {
      $('#notifyDiv').fadeIn();
      $('#notifyDiv').css('background', 'green');
      $('#notifyDiv').text('Item Added Succsessfuly');
      setTimeout(() => {
        $('#notifyDiv').fadeOut();
      }, 3000);
    }

    function displayErrorMessage() {
      $('#notifyDiv').fadeIn();
      $('#notifyDiv').css('background', 'orange');
      $('#notifyDiv').text('The Quantity Items IS Zero');
      setTimeout(() => {
        $('#notifyDiv').fadeOut();
      }, 3000);
    }
    $(function() {
      $('#add').click(function() {
        addnewrow();
      });
      $('body').delegate('.remove', 'click', function() {
        $(this).parent().parent().remove();
      });
      $('body').delegate('.quantity', 'keyup', function() {
        vartr = $(this).parent().parent();
        varqty = tr.find('.quantity').val();


      });
    });

    function total() {
      var t = 0;
      $('.amount').each(function(i, e) {
        varamt = $(this).val() - 0;
        t += amt;
      });
      $('.total').html(t);
    }

    function addnewrow() {
      var n = ($('.detail tr').length - 0) + 1;
      vartr = '<tr>' +
        '<td class="no">' + n + '</td>' +
        '<td><input type="text" class="form-control productname" name="productname[]"></td>' +
        '<td><input type="text" class="form-control quantity" name="quantity[]"></td>' +


        '<td><a href="#" class="remove">Delete</td>' +
        '</tr>';
      $('.detail').append(vartr);

    }

   
    function show1() {
      arr['user_id'] = <?=$_SESSION['user']->user_id?>;
      $.ajax({
        method: 'POST',
        url: '/admin/selling/list',
        data:arr,
        success: function(response) {
          let data = JSON.parse(response);
        
          /* var id = data.result.data[0].id;
           var productname = data.result.data[0].name;
           var quantity = data.result.data[0].quantity;
           var row = `<tr><td> ${productname} </td></tr>`;
           var row = `<tr><td> ${quantity} </td></tr>`;
           var row = `<tr>
                           <td><input type="text" class="form-control productname" value = "${id}" name="productid[]"></td>
                           <td><input type="text" class="form-control productname" value = "${productname}" name="productname[]"></td>
                           <td><input type="text" class="form-control quantity"  value ="${quantity}" value = "" name="quantity[]"></td>
                           <td><a href="#" class="remove">Delete</td>
                           </tr>`;
           $('tbody').append(row);
        */ }
      });
    }
  
</script>
</html>