<footer class="footer">
	<div class="container">
		<span class="text-muted">
			<b>
				<div class="text-center">
					<a href="https://lasahido.id/" target="_blank">lasahido.id</a> &mdash; <?= date("Y");?>
				</div>

			</b>
	  	</span>
	</div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
    } );

	$(document).ready(function() {
		// Setup - add a text input to each footer cell
		$('#elementTable tfoot th').each( function () {
			var title = $(this).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		} );
	
		// DataTable
		var table = $('#elementTable').DataTable({
			initComplete: function () {
				// Apply the search
				this.api().columns().every( function () {
					var that = this;
	
					$( 'input', this.footer() ).on( 'keyup change clear', function () {
						if ( that.search() !== this.value ) {
							that
								.search( this.value )
								.draw();
						}
					} );
				} );
			}
		});
	
	} );
</script>
<script src="<?= base_url();?>assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url();?>assets/js/modules-sweetalert.js"></script>
