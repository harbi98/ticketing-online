$(".edit_ticket").click(function () {
    ticket($(this).data("ticket-id"));
    // console.log($(this).data("ticket-id"));
});

$(".delete_ticket").click(function(e) {
    e.preventDefault();

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this ticket!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((then) => {
        if (then) {
            ticket2($(this).data("ticket-id"));
        }
    });
});

function ticket(ticket_id) {
    $.ajax({
        url: "admin/view-ticket",
        type: "GET",
        data: {
            ticket_id: ticket_id,
        },
        dataType: "json",
        success: function (response) {
            $("#ticket_id").val(response.id);
            $("#ticket_name").val(response.ticket_name);
            $("#ticket_type").val(response.ticket_type);
            $("#ticket_price").val(response.price);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

$(".edit_sales").click(function() {
    // console.log($(this).data('sale-id'))
    $.ajax({
        url: "admin/edit-sale",
        type: "GET",
        data: {
            sale_id: $(this).data('sale-id'),
        },
        dataType: "json",
        success: function(response) {
            $('#ticketList').empty();
            var total = 0;
            var quantity = 0;
            var total_price = 0;
            $.each(response, function (index, row) {
                quantity += row.customer_quantity;
                total_price = row.ticket.price;
                var tr = '<tr>';
                tr += '<td>' + row.ticket_num + '</td>';
                tr += '<td>' + row.reference_num + '</td>';
                tr += '<td>' + row.ticket_id + '</td>';
                tr += '<td>₱ ' + row.ticket.price + '</td>';
                tr += '<td><a href="#" class="btn btn-warning text-white btn-sm" data-ticket-id="' + row.id + '">Update</td>';
                tr += '</tr>';
                $('#ticketList').append(tr);
            });
            var total = parseInt(total_price) * parseInt(quantity);
            $('#totalPrice').text('₱ ' + total.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            // console.log();
        },
        error: function(xhr, status, error) {
            console.error(error);
        },
    });
});

function ticket2(ticket_id) {
    $.ajax({
        url: "admin/delete-ticket",
        type: "GET",
        data: {
            ticket_id: ticket_id,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        // dataType: "json",
        success: function (response) {
            // 
            if(response == "success"){
                swal("Deleted Successfully!", "Your ticket has been deleted.", "success").then((yes) => {
                    if(yes){
                        location.reload();
                    }
                });
            }else{
                swal("Error", "Something went wrong!", "error");
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}