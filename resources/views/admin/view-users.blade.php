@include('admin.header')

<div class="container p-4">
    <h1>All Users</h1>
    <div class="notifications"></div>
    <table id="usertable" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name/User Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    var table = $('#usertable').DataTable({
        "order": []
    });

    viewuser();
    function viewuser() {
        $.ajax({
            type: "GET",
            url: "/view-userajax",
            dataType: "json",
            success: function(response) {
                table.clear();
                $.each(response.users, function(keys, items) {
                    var featurestatus = items.userrole === 1 ? 
                        '<span class="status-published" data-id="' + items.id + '">Active</span>' : 
                        '<span class="status-draft" data-id="' + items.id + '">Blocked</span>';

                    table.row.add([
                        items.id,
                        items.username,
                        items.useremail,
                        featurestatus
                    ]);
                });
                table.draw();
            }
        });
    }

    
    $('#usertable').on('click', '.status-published, .status-draft', function() {
        var userId = $(this).data('id');
        var currentStatus = $(this).hasClass('status-published') ? 1 : 0; 
        var newStatus = currentStatus === 1 ? 0 : 1; 
        $.ajax({
            type: "POST",
            url: "/update-user-status", 
            data: {
                id: userId,
                status: newStatus,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status === 200) {
                    viewuser();
                    $('.notifications').html(response.message);
                    $('.confirm_msgs').fadeIn();
                        setTimeout(function() {
                            $('.confirm_msgs').fadeOut('slow');
                        }, 3000);
                } else {
                    alert('Failed to update status');
                }
            }
        });
    });
});

</script>
@include('admin.footer')