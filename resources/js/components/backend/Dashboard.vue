<template>
    <div class="container">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Fresh-Shop</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="http://localhost:8000/admin/dashboard">Home</a></li>
	              <li class="breadcrumb-item active">Fresh-Shop</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">

	        <!-- Info boxes -->
	        <div class="row">
	          <div class="col-12 col-sm-6 col-md-3">
	            <div class="info-box mb-3">
	              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

	              <div class="info-box-content">
	                <span class="info-box-text">Total Likes</span>
	                <span class="info-box-number">41,410</span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->

	          <div class="col-12 col-sm-6 col-md-3">
	            <div class="info-box">
	              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-copy"></i></span>

	              <div class="info-box-content">
	                <span class="info-box-text">Total Uploads</span>
	                <span class="info-box-number">4,110</span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->

	          <!-- fix for small devices only -->
	          <div class="clearfix hidden-md-up"></div>

	          <div class="col-12 col-sm-6 col-md-3">
	            <div class="info-box mb-3">
	              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

	              <div class="info-box-content">
	                <span class="info-box-text">Total Orders</span>
	                <span class="info-box-number">760</span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
	          <div class="col-12 col-sm-6 col-md-3">
	            <div class="info-box mb-3">
	              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

	              <div class="info-box-content">
	                <span class="info-box-text">Total Members</span>
	                <span class="info-box-number">2,000</span>
	              </div>
	              <!-- /.info-box-content -->
	            </div>
	            <!-- /.info-box -->
	          </div>
	          <!-- /.col -->
	        </div>
	        <!-- /.row -->

	        <div class="row">
	        	<div class="col-md-8">
	        	<!-- TABLE: LATEST ORDERS -->
	            <div class="card">
	              <div class="card-header border-transparent">
	                <h3 class="card-title">Latest Orders</h3>

	                <div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                  <button type="button" class="btn btn-tool" data-card-widget="remove">
	                    <i class="fas fa-times"></i>
	                  </button>
	                </div>
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body p-0">
	                <div class="table-responsive">
	                  <table class="table m-0">
	                    <thead>
	                    <tr>
	                      <th>Order ID</th>
	                      <th>Item</th>
	                      <th>Status</th>
	                      <th>Popularity</th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
	                      <td>Call of Duty IV</td>
	                      <td><span class="badge badge-success">Shipped</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
	                      <td>Samsung Smart TV</td>
	                      <td><span class="badge badge-warning">Pending</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
	                      <td>iPhone 6 Plus</td>
	                      <td><span class="badge badge-danger">Delivered</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
	                      <td>Samsung Smart TV</td>
	                      <td><span class="badge badge-info">Processing</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
	                      <td>Samsung Smart TV</td>
	                      <td><span class="badge badge-warning">Pending</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
	                      <td>iPhone 6 Plus</td>
	                      <td><span class="badge badge-danger">Delivered</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
	                      <td>Call of Duty IV</td>
	                      <td><span class="badge badge-success">Shipped</span></td>
	                      <td>
	                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
	                      </td>
	                    </tr>
	                    </tbody>
	                  </table>
	                </div>
	                <!-- /.table-responsive -->
	              </div>
	              <!-- /.card-body -->
	              <div class="card-footer clearfix">
	                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
	                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
	              </div>
	              <!-- /.card-footer -->
	            </div>
	            <!-- /.card -->

	            <!-- DIRECT CHAT -->
	                <div class="card direct-chat direct-chat-warning">
	                  <div class="card-header">
	                    <h3 class="card-title">Direct Chat</h3>

	                    <div class="card-tools">
	                      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3</span>
	                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
	                      </button>
	                      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
	                              data-widget="chat-pane-toggle">
	                        <i class="fas fa-comments"></i></button>
	                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
	                      </button>
	                    </div>
	                  </div>
	                  <!-- /.card-header -->
	                  <div class="card-body">
	                    <!-- Conversations are loaded here -->
	                    <div class="direct-chat-messages">
	                      <!-- Message. Default to the left -->
	                      <div class="direct-chat-msg">
	                        <div class="direct-chat-infos clearfix">
	                          <span class="direct-chat-name float-left">Alexander Pierce</span>
	                          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
	                        </div>
	                        <!-- /.direct-chat-infos -->
	                        <img class="direct-chat-img" :src="'/backend/dist/img/user1-128x128.jpg'" alt="message user image'">
	                        <!-- /.direct-chat-img -->
	                        <div class="direct-chat-text">
	                          Is this template really for free? That's unbelievable!
	                        </div>
	                        <!-- /.direct-chat-text -->
	                      </div>
	                      <!-- /.direct-chat-msg -->

	                      <!-- Message to the right -->
	                      <div class="direct-chat-msg right">
	                        <div class="direct-chat-infos clearfix">
	                          <span class="direct-chat-name float-right">Sarah Bullock</span>
	                          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
	                        </div>
	                        <!-- /.direct-chat-infos -->
	                        <img class="direct-chat-img" :src="'/backend/dist/img/user3-128x128.jpg'" alt="message user image">
	                        <!-- /.direct-chat-img -->
	                        <div class="direct-chat-text">
	                          You better believe it!
	                        </div>
	                        <!-- /.direct-chat-text -->
	                      </div>
	                      <!-- /.direct-chat-msg -->

	                      <!-- Message. Default to the left -->
	                      <div class="direct-chat-msg">
	                        <div class="direct-chat-infos clearfix">
	                          <span class="direct-chat-name float-left">Alexander Pierce</span>
	                          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
	                        </div>
	                        <!-- /.direct-chat-infos -->
	                        <img class="direct-chat-img" :src="'/backend/dist/img/user1-128x128.jpg'" alt="message user image">
	                        <!-- /.direct-chat-img -->
	                        <div class="direct-chat-text">
	                          Working with AdminLTE on a great new app! Wanna join?
	                        </div>
	                        <!-- /.direct-chat-text -->
	                      </div>
	                      <!-- /.direct-chat-msg -->

	                      <!-- Message to the right -->
	                      <div class="direct-chat-msg right">
	                        <div class="direct-chat-infos clearfix">
	                          <span class="direct-chat-name float-right">Sarah Bullock</span>
	                          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
	                        </div>
	                        <!-- /.direct-chat-infos -->
	                        <img class="direct-chat-img" :src="'/backend/dist/img/user3-128x128.jpg'" alt="message user image">
	                        <!-- /.direct-chat-img -->
	                        <div class="direct-chat-text">
	                          I would love to.
	                        </div>
	                        <!-- /.direct-chat-text -->
	                      </div>
	                      <!-- /.direct-chat-msg -->

	                    </div>
	                    <!--/.direct-chat-messages-->

	                    <!-- Contacts are loaded here -->
	                    <div class="direct-chat-contacts">
	                      <ul class="contacts-list">
	                        <li>
	                          <a href="#">
	                            <img class="contacts-list-img" :src="'/backend/dist/img/user1-128x128.jpg'">

	                            <div class="contacts-list-info">
	                              <span class="contacts-list-name">
	                                Count Dracula
	                                <small class="contacts-list-date float-right">2/28/2015</small>
	                              </span>
	                              <span class="contacts-list-msg">How have you been? I was...</span>
	                            </div>
	                            <!-- /.contacts-list-info -->
	                          </a>
	                        </li>
	                        <!-- End Contact Item -->
	                        <li>
	                          <a href="#">
	                            <img class="contacts-list-img" :src="'/backend/dist/img/user7-128x128.jpg'">

	                            <div class="contacts-list-info">
	                              <span class="contacts-list-name">
	                                Sarah Doe
	                                <small class="contacts-list-date float-right">2/23/2015</small>
	                              </span>
	                              <span class="contacts-list-msg">I will be waiting for...</span>
	                            </div>
	                            <!-- /.contacts-list-info -->
	                          </a>
	                        </li>
	                        <!-- End Contact Item -->
	                        <li>
	                          <a href="#">
	                            <img class="contacts-list-img" :src="'/backend/dist/img/user3-128x128.jpg'">

	                            <div class="contacts-list-info">
	                              <span class="contacts-list-name">
	                                Nadia Jolie
	                                <small class="contacts-list-date float-right">2/20/2015</small>
	                              </span>
	                              <span class="contacts-list-msg">I'll call you back at...</span>
	                            </div>
	                            <!-- /.contacts-list-info -->
	                          </a>
	                        </li>
	                        <!-- End Contact Item -->
	                        <li>
	                          <a href="#">
	                            <img class="contacts-list-img" :src="'/backend/dist/img/user5-128x128.jpg'">

	                            <div class="contacts-list-info">
	                              <span class="contacts-list-name">
	                                Nora S. Vans
	                                <small class="contacts-list-date float-right">2/10/2015</small>
	                              </span>
	                              <span class="contacts-list-msg">Where is your new...</span>
	                            </div>
	                            <!-- /.contacts-list-info -->
	                          </a>
	                        </li>
	                        <!-- End Contact Item -->
	                        <li>
	                          <a href="#">
	                            <img class="contacts-list-img" :src="'/backend/dist/img/user6-128x128.jpg'">

	                            <div class="contacts-list-info">
	                              <span class="contacts-list-name">
	                                John K.
	                                <small class="contacts-list-date float-right">1/27/2015</small>
	                              </span>
	                              <span class="contacts-list-msg">Can I take a look at...</span>
	                            </div>
	                            <!-- /.contacts-list-info -->
	                          </a>
	                        </li>
	                        <!-- End Contact Item -->
	                        <li>
	                          <a href="#">
	                            <img class="contacts-list-img" :src="'/backend/dist/img/user8-128x128.jpg'">

	                            <div class="contacts-list-info">
	                              <span class="contacts-list-name">
	                                Kenneth M.
	                                <small class="contacts-list-date float-right">1/4/2015</small>
	                              </span>
	                              <span class="contacts-list-msg">Never mind I found...</span>
	                            </div>
	                            <!-- /.contacts-list-info -->
	                          </a>
	                        </li>
	                        <!-- End Contact Item -->
	                      </ul>
	                      <!-- /.contacts-list -->
	                    </div>
	                    <!-- /.direct-chat-pane -->
	                  </div>
	                  <!-- /.card-body -->
	                  <div class="card-footer">
	                    <form action="#" method="post">
	                      <div class="input-group">
	                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
	                        <span class="input-group-append">
	                          <button type="button" class="btn btn-warning">Send</button>
	                        </span>
	                      </div>
	                    </form>
	                  </div>
	                  <!-- /.card-footer-->
	                </div>
	            <!--/.direct-chat -->
	        	</div>
	        	<div class="col-md-4">

	                <div class="card">
		              <div class="card-header border-0">
		                <div class="d-flex justify-content-between">
		                  <h3 class="card-title">Online Store Visitors</h3>
		                  <a href="javascript:void(0);">View Report</a>
		                </div>
		              </div>
		              <div class="card-body">
		                <div class="d-flex">
		                  <p class="d-flex flex-column">
		                    <span class="text-bold text-lg">820</span>
		                    <span>Visitors Over Time</span>
		                  </p>
		                  <p class="ml-auto d-flex flex-column text-right">
		                    <span class="text-success">
		                      <i class="fas fa-arrow-up"></i> 12.5%
		                    </span>
		                    <span class="text-muted">Since last week</span>
		                  </p>
		                </div>
		                <!-- /.d-flex -->

		                <div class="position-relative mb-4">
		                  <canvas id="visitors-chart" height="200"></canvas>
		                </div>

		                <div class="d-flex flex-row justify-content-end">
		                  <span class="mr-2">
		                    <i class="fas fa-square text-primary"></i> This Week
		                  </span>

		                  <span>
		                    <i class="fas fa-square text-gray"></i> Last Week
		                  </span>
		                </div>
		              </div>
		            </div>
		            <!-- /.card -->

		            <!-- USERS LIST -->
	                <div class="card">
	                  <div class="card-header">
	                    <h3 class="card-title">Latest Members</h3>

	                    <div class="card-tools">
	                      <span class="badge badge-danger">8 New Members</span>
	                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
	                      </button>
	                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
	                      </button>
	                    </div>
	                  </div>
	                  <!-- /.card-header -->
	                  <div class="card-body p-0">
	                    <ul class="users-list clearfix">
	                      <li>
	                        <img :src="'/backend/dist/img/user1-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Alexander Pierce</a>
	                        <span class="users-list-date">Today</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user8-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Norman</a>
	                        <span class="users-list-date">Yesterday</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user7-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Jane</a>
	                        <span class="users-list-date">12 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user6-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">John</a>
	                        <span class="users-list-date">12 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user2-160x160.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Alexander</a>
	                        <span class="users-list-date">13 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user5-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Sarah</a>
	                        <span class="users-list-date">14 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user4-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Nora</a>
	                        <span class="users-list-date">15 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user3-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Nadia</a>
	                        <span class="users-list-date">15 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user1-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Alexander Pierce</a>
	                        <span class="users-list-date">Today</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user8-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Norman</a>
	                        <span class="users-list-date">Yesterday</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user7-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">Jane</a>
	                        <span class="users-list-date">12 Jan</span>
	                      </li>
	                      <li>
	                        <img :src="'/backend/dist/img/user6-128x128.jpg'" alt="User Image">
	                        <a class="users-list-name" href="#">John</a>
	                        <span class="users-list-date">12 Jan</span>
	                      </li>
	                    </ul>
	                    <!-- /.users-list -->
	                  </div>
	                  <!-- /.card-body -->
	                  <div class="card-footer text-center">
	                    <a href="javascript::">View All Users</a>
	                  </div>
	                  <!-- /.card-footer -->
	                </div>
	                <!--/.card -->
	        	</div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content -->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
