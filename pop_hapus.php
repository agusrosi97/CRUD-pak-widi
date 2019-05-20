<!-- MODAL DELETE -->
<div class="modal fade" id="hapus_<?php echo $data['nis']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="box-shadow: 10px 10px 20px rgba(0,0,0,.5)">
            <div class="modal-header bg-light">
                <h3 class="modal-title" id="exampleModalLabel">Konfirmasi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<h5 class="text-center"><?php echo "Hapus ID <span class='text-danger'>T-00".$data['nis'].'</span> dengan nama <span class=text-danger>'.$data['nama']."</span>, lanjutkan ?"; ?></h5>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <a href="hapus.php?nis=<?php echo $data['nis'] ?>" class="btn btn-danger">Hapus Data</a>
            </div>
        </div>
    </div>
</div>