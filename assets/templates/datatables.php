<!-- Page level custom scripts -->
<script src="<?php echo $url; ?>/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>