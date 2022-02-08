<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="modal modal-success fade" id="modal-success">
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Total Hasil</h4>
              </div>
              <?php foreach($data_bs as $u){ ?>
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('dashboard/c_abs/update') ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $u->id ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Saldo :</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama" name="saldo" value="<?php echo ($u->saldo) ?>">
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-outline pull-right">Save changes</button>
                </div>
              </div>
                </form>
              <?php } ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
            </div>
            <!-- /.box-body-->
    <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</div>
