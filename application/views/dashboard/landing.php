        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-dashboard fa-fw"></i> Dashboard Home</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

<div ng-controller="dashboardController">
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
              <div class="row mt">
                  <aside class="col-lg-3 mt">
                  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#bookingModal"><i class="li_calendar"></i> Make a Reservation</button>
                    <hr/>
                      <h4><i class="fa fa-angle-right"></i> Today's Check-out</h4>
                        <ul>
                          <li style="padding-bottom: 5px;"><span class="badge bg-inverse">112</span>&nbsp;&nbsp;Anne-Marie Lainé</li>
                          <li style="padding-bottom: 5px;"><span class="badge bg-inverse">152</span>&nbsp;&nbsp;Jacques Barthelot</li>
                          <li style="padding-bottom: 5px;"><span class="badge bg-inverse">202</span>&nbsp;&nbsp;Sandrine Girin</li>
                        </ul>
                        <hr/>
                      <h4><i class="fa fa-angle-right"></i> Today's Check-in</h4>
                        <ul>
                          <li style="padding-bottom: 5px;"><span class="badge bg-success">101</span>&nbsp;&nbsp;Noah Guthrie</li>
                          <li style="padding-bottom: 5px;"><span class="badge bg-success">203</span>&nbsp;&nbsp;Bon Iver</li>
                          <li style="padding-bottom: 5px;"><span class="badge bg-success">301</span>&nbsp;&nbsp;Carla Bruni</li>
                        </ul>
                      <hr/>
                </aside>
                  <aside class="col-lg-9 mt">
                      <section class="panel">
                          <div class="panel-body">
                          calendar should go here
                              <!-- <div id="calendar" class="has-toolbar"></div> -->
                          </div>
                      </section>
                  </aside>
              </div>
        </section><!--/wrapper -->
    </section>
      <!--main content end-->
      <!-- MODALS -->
            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="li_calendar"></i> Make a Reservation</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <input ng-model="booking.reference_name" type="text" style="width: 400px;" class="form-control" placeholder="Reservation Reference Name">
                    </div>
                    <div class="form-inline" style="margin-bottom: 15px;">
                      <div class="form-group">
                        <div id="checkin" class="input-append date" style="margin-right: 5px;">
                          <input ng-model="booking.checkin" data-format="dd/MM/yyyy" type="text" class="picker" style="width: 125px;" placeholder="Check-in"></input>
                          <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div id="checkout" class="input-append date">
                          <input ng-model="booking.checkout" data-format="dd/MM/yyyy" type="text" class="picker" style="width: 125px;" placeholder="Check-out"></input>
                          <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-inline" style="margin-bottom: 15px;">  
                      <div class="form-group" style="margin-right: 5px;">
                        <select ng-model="booking.room_id" class="form-control" style="width: 300px;" ng-change="getRoom(booking.room_id)">
                          <option value="">Select Room</option>
                          <option ng-repeat="room in rooms" value="{{room.identifier}}">({{room.type}}) {{room.name}} at {{room.rate}} for {{room.capacity}}</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input ng-model="booking.guests_count" type="text" class="form-control" style="width:110px;" placeholder="Guests count">
                      </div>
                    </div>
                    <div class="form-inline" style="margin-bottom: 15px;">  
                      <div class="form-group" style="margin-right: 5px;">
                        <input ng-model="booking.amount_paid" type="text" class="form-control" style="width:150px;" placeholder="Payment Amount">
                      </div>    
                      <div class="form-group">
                        <select class="form-control" ng-model="payment_type" style="width: 200px;">
                          <option value="">Payment Type</option>
                          <option value="1">Credit Card</option>
                          <option value="2">Cash</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea ng-model="booking.remarks" style="width: 500px;" class="form-control" placeholder="Remarks and/or special requests"></textarea>
                    </div>       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" ng-click="confirmBooking()">Continue</button>
                  </div>
                </div>
              </div>
            </div>   

            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="li_calendar"></i> Reservation Summary</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                    <strong>Reference Name: </strong>{{booking.reference_name}} <br/>
                    <strong>Check-in Dates: </strong> {{booking.checkin}} to {{booking.checkout}}<br/>
                    <strong>Number of Nights: </strong> {{}}<br/>
                    <strong>Accommodation: </strong> {{}}<br/>
                    <strong>Guests Count: </strong> {{}}<br/>
                    <strong>Extra Guest(s): </strong> {{}}<br/>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Continues</button>
                  </div>
                </div>
              </div>
            </div>
</div>


            <!-- /.container-fluid -->
        </div>