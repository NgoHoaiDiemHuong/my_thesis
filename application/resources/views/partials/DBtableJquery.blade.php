<script src="{{url('assets/js/jquery.dataTables.js')}}"></script>
<script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/js/dataTables.tableTools.js')}}"></script>
<script src="{{url('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/dataTables.bootstrap.js')}}"></script>
<script>
$(document).ready(function() {

     var table = $('#DBtableJQuery').DataTable({
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
                },

            });
     var tt = new $.fn.dataTable.TableTools( table );
    $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
} );
</script>