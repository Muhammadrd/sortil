<div id="edit" class="modal fade" role="dialog">
          		<div class="modal-dialog">
          			<div class="modal-content">
          				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h4 class="modal-title">Edit data barang</h4>
          				</div>
          				<form id="form" enctype="multipart/form-data">
          					<div class="modal-body" id="modal-edit">
          						<div class="form-group">
          							<input type="hidden" name="id_brg" id="id_brg">
          							<label for="nm1_brg" class="control-label">Nama barang</label>
          							<input type="text" name="nm1_brg" class="form-control" id="nm1_brg" required>
          						</div>
          						<div class="form-group">
          							<label for="hrg1_brg" class="control-label">Harga barang</label>
          							<input type="number" name="hrg1_brg" class="form-control" id="hrg1_brg" required>
          						</div>
          						<div class="form-group">
          							<label for="stk1_brg" class="control-label">Stok barang</label>
          							<input type="number" name="stk1_brg" class="form-control" id="stk1_brg" required>
          						</div>
          					</div>
          					<div class="modal-footer">
          						<input type="submit" class="btn btn-success" name="edit" value="simpan">
          					</div>  
          				</form>
          			</div>
          		</div>
          	</div>

          	
    		<script type="text/javascript">
    			$(document).on("click", "#edit_brg", function() {
    				var idbrg = $(this).data('id');
    				var nmbrg = $(this).data('nama');
    				var hrgbrg = $(this).data('harga');
    				var stkbrg = $(this).data('stok');
    				$("#modal-edit #id_brg").val(idbrg);
    				$("#modal-edit #nm1_brg").val(nmbrg);
    				$("#modal-edit #hrg1_brg").val(hrgbrg);
    				$("#modal-edit #stk1_brg").val(stkbrg);
    			})
    			$(document).ready(function(e) {
    				$("#form").on("submit", (function(e) {
    					e.preventDefault();
    					$.ajax({
    						url : 'models/proses_edit_barang.php',
    						type : 'POST',
    				 		data : new FormData(this),
    						contentType : false,
    						cache : false,
    						processData : false,
    						success : function(msg) {
    							$('.table').html(msg);
    						}
    					});
    				}));
    			})
    		</script> <br>