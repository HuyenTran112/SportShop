
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

    function xacNhanXoa(msg) {
        if(window.confirm(msg)) {
            return true;
        }
        else
            return false;
    };

    $("div.alert").delay(3000).slideUp();
   