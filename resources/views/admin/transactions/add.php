


    <?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Transaction</title>


</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
    <div id="notifyDiv" class="d-flex justify-content-center display"></div>
    <form action="" method="POST">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="d-flex justify-content-center">Transaction page </h3> <br> <br>
            </div>
            <div class="box-body">
                <div class="form-group">
                    item
                    <input type="text" id="itemName" name="itemName" class="form-control">
                </div>
            </div>

        </div>
        <br>
        <table style="background-color:#D6EEEE  ; width:800px;margin-top : 20px; border-radius: 15px;font-family :tahoma; text-align:center; margin-left:auto;margin-right:auto" class="table table-bordered table-hover">
            <thead>
                <th>No</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Amount</th>
                <th><input type="button" value="+" id="add" class="btnbtn-primary"></th>
            </thead>
            <tbody class="detail">

            </tbody>
            <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tfoot>

        </table>
        <div class=" d-flex justify-content-end my-2">
        Total Price : <input type="text" id="total" name="total" value="0">
    </div>
    </form>

    <form>

        <button type="submit">save </button>
    </form>
    
</body>

</html>
<script src=" //code.jquery.com/jquery-1.12.0.min.js"></script>
<script src=" //code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
    document.addEventListener('keydown', function(event) {
        if (event.keyCode == 17 || event.keyCode == 74)
            event.preventDefault();
    });
</script>
<script type="text/javascript">
    var checkArray = [];
    $('#itemName').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (checkArray.hasOwnProperty($('#itemName').val(), checkArray)) {
                var totalQuantity = parseInt(checkArray[$('#itemName').val()]['quantity']);
                checkArray[$('#itemName').val()]['qu'] += 1;
                var quantity = parseInt($("#q_" + $('#itemName').val()).val());
                if (totalQuantity > quantity) {
                    $("#q_" + $('#itemName').val()).val(parseInt($("#q_" + $('#itemName').val()).val()) + 1);
                    let currentTotal = parseFloat($('#total').val());
                    let price1 = parseFloat(checkArray[$('#itemName').val()]['price']);
                    console.log(price1);
                    console.log(currentTotal);
                    currentTotal = currentTotal + price1;

                    $('#total').val(currentTotal);
                    $('#itemName').val('');

                    /*  let currentTotal = parseFloat($('#total').val());
                          currentTotal = currentTotal + price;
                          $('#total').val(currentTotal);
                          $('#itemName').val('');*/
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
                            checkArray[$('#itemName').val()] = [];
                            checkArray[$('#itemName').val()]["quantity"] = data.result.data[0].quantity;
                            checkArray[$('#itemName').val()]["price"] = data.result.data[0].selling_price_per_unit;
                            checkArray[$('#itemName').val()]["qu"] = 1;
                            var id = data.result.data[0].id;
                            var itemname = data.result.data[0].name;
                            var quantity = data.result.data[0].quantity;
                            var price = data.result.data[0].selling_price;
                            var row = `<tr><td> ${itemname} </td></tr>`;
                            var row = `<tr><td> ${quantity} </td></tr>`;
                            var row = `<tr>
                        <td><input type="text" class="form-control productid" value = "${id}" name="productid[]"></td>
                        <td><input type="text" class="form-control productname" value = "${itemname}" name="itemname[]"></td>
                        <td><input type="text" class="form-control quantity"  min="1" max="${quantity}" value = "${quantity}" name="quantity[]"></td>
                        <td><input  id="p_${itemname}" type="text" class="form-control price"  value = "${price}" name="price[]"></td>
                        <td><input id="q_${itemname}"onchange ="changeQuantity('${itemname}', this)" type="number" step="1" min="1" max="${quantity}" class="form-control amount" value = "1" name="amount[]"></td>
                        <td><a href="#" id ="d_${itemname}" onclick = "delItem(this,'${itemname}')"  value = "${itemname}"class="remove">Delete</td>
                        </tr>`;
                            $('tbody').append(row);
                            let currentTotal = parseFloat($('#total').val());
                            currentTotal = currentTotal + price;
                            $('#total').val(currentTotal);
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
        total = $('#total').val();
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

    function changeQuantity(itemname, input) {
        let updateTotal = checkArray[itemname]['qu'] * checkArray[itemname]['price'];
        $('#total').val(parseFloat($('#total').val()) - updateTotal);
        checkArray[itemname]['qu'] = parseInt($(input).val());
        updateTotal = checkArray[itemname]['qu'] * checkArray[itemname]['price'];
        $('#total').val(parseFloat($('#total').val()) + updateTotal);
    }

    function delItem(input, barcode) {
        let updateTotal = checkArray[itemname]['qu'] * checkArray[itemname]['price'];
        $('#total').val(parseFloat($('#total').val()) - updateTotal);
        delete checkArray[itemname];

        $('body').delegate('.remove', 'click', function() {
            $(input).parent().parent().remove();
        });
    }



    $(function() {
        $('#add').click(function() {
            addnewrow();
        });
        $('body').delegate('.remove', 'click', function() {
            $(this).parent().parent().remove();
        });
        $('body').delegate('.quantity,.price,.discount', 'keyup', function() {
            vartr = $(this).parent().parent();
            varqty = tr.find('.quantity').val();
            var price = tr.find('.price').val();

            var dis = tr.find('.discount').val();
            varamt = (qty * price) - (qty * price * dis) / 100;
            tr.find('.amount').val(amt);
            total();
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
            '<td><input type="text" class="form-control itemname" name="itemname[]"></td>' +
            '<td><input type="text" class="form-control quantity" name="quantity[]"></td>' +
            '<td><input type="text" class="form-control price" name="price[]"></td>' +
            '<td><input type="text" class="form-control sale" name="sale[]"></td>' +
            '<td><input type="text" class="form-control amount" name="amount[]"></td>' +
            '<td><a href="#" class="remove">Delete</td>' +
            '</tr>';
        $('.detail').append(vartr);
    }
</script>
 
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</body>
</html>