<?php $this->load->view('header',$this->data); ?>
    <style>
        .pac-container {
            z-index: 99999;
        }
    </style>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyBENw1sanuCYXWMbmOWZO_PUpYvyPqQ8Yw&sensor=false&libraries=places'></script>
    <script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.min.js"></script>

    <div class="page-content">
        <div class="row">
            <div class="col-md-10">
                <div class="row">



                    <div class="col-md-6">
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <h3>Update Location</h3>

                                <!--<div class="panel-options">
                                  <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                  <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                                </div>-->
                            </div>
                            <div class="panel-body">
                                <?php if (validation_errors()): ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <?php echo validation_errors();?>
                                    </div>
                                <?php endif; ?>

                                <?php if(isset($_SESSION['msg_error'])){ ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <?php echo display_error(); ?>
                                    </div>
                                <?php } ?>

                                <?php if(isset($_SESSION['msg_success'])){ ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <?php echo display_success_message(); ?>
                                    </div>
                                <?php } ?>
                                <form action="<?php echo base_url(); ?>welcome/user_update" method="post" id="insert_form" autocomplete="false">
                                    <fieldset>
                                        <div align="center">
                                            <h4> Select with <a href="#" data-target="#us6-dialog" data-toggle="modal">Google Map</a>
                                                </h4>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <input name="address" type="text" required="required"  class="form-control" id="name" placeholder="name" value="<?php echo $update_data->address; ?>">
                                        </div>
                                        <div class="form-group col-md-5 row">
                                            <label>Select Location(Longitude)</label>
                                            <input type="text" class="form-control" name="longitude" id="longitude"  placeholder="Location(Longitude)" value="<?php echo $update_data->longitude; ?>">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Select Location(Latitude)</label>
                                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Location(Latitude)" value="<?php echo $update_data->latitude; ?>">
                                        </div>
                                    </fieldset>
                                    <div>
                                        <input type="hidden" value="<?php echo $update_data->id; ?>" name="id">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div id="us6-dialog" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select Location</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" style="width: 550px">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Location:</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $update_data->address; ?>" id="us3-address" />
                            </div>
                        </div>

                        <div id="us3" style="width: 100%; height: 300px;"></div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="m-t-small">
                            <label class="p-r-small col-sm-1 control-label">Lat.:</label>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $update_data->latitude; ?>" style="width: 110px" id="us3-lat" />
                            </div>
                            <label class="p-r-small col-sm-2 control-label">Long.:</label>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="<?php echo $update_data->longitude; ?>" style="width: 110px" id="us3-lon" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <script>
                            $(document).ready(function(e) {
                                $('#us3').locationpicker({
                                    location: {
                                        latitude: <?php echo $update_data->latitude; ?>,
                                        longitude: <?php echo $update_data->longitude; ?>
                                    },
                                    radius: 0,
                                    inputBinding: {
                                        latitudeInput: $('#us3-lat'),
                                        longitudeInput: $('#us3-lon'),
                                        radiusInput: $('#us3-radius'),
                                        locationNameInput: $('#us3-address')
                                    },
                                    enableAutocomplete: true
                                });
                                $('#us6-dialog').on('shown.bs.modal', function () {
                                    $('#us3').locationpicker('autosize');
                                });
                            });


                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" aria-label="Close" id="closemodel" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="save" class="btn btn-primary">Done</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        $("#save").click(function(){


            var add=$('#us3-address').val();
            var long=$('#us3-lon').val();
            var lat=$('#us3-lat').val();
            var location = long + lat;
            $('#name').val(add);
            $('#longitude').val(long);
            $('#latitude').val(lat);
            $('#us6-dialog').modal('hide');


        });
    </script>
<?php $this->load->view('footer',$this->data); ?>