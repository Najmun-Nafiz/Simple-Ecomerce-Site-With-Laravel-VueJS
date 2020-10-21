<template>
    <div class="container">
        <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Subscribers</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Subscribers</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-12">

	            <div class="card datatable-background">
	              <div class="card-header">
	                <h3 class="card-title text-light font-weight-bold">Total Subscribers </h3>
	              </div>
	              <div class="datatable-header pl-4 pr-4">  
	                <strong class="float-left font-weight-bold">Search By : </strong>
	                <div class="datatable-select ml-4">
	                  <select v-model="queryField" class="form-control" id="field">
	                    <option value="id">Id</option>
	                    <option value="subscriber">Subscriber</option>
	                  </select>
	                </div>
	                <div class="datatable-search">
	                  <input v-model="query" type="text" class="form-control" placeholder="Search">
	                </div>  
	              </div>
	              <!-- /.card-header -->

		          <!-- /.Destroy-Modal -->
		        <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		            <div class="modal-dialog">
		              <div class="modal-content bg-danger">
		                <div class="modal-header">
		                  <h4 class="modal-title" id="deleteModalLabel">Danger Modal</h4>
		                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">×</span>
		                  </button>
		                </div>
		                <form @submit.prevent="destoryInfo" @keydown="form.onKeydown($event)">
		                  <div class="modal-body destroy-body">
		                    <h5 class="card-title">Are you sure ?</h5>
		                  </div>
		                  <div class="modal-footer justify-content-between border-0">
		                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
		                    <button :disabled="form.busy" type="submit" class="btn btn-primary">Yes</button>
		                  </div>
		                </form>
		              </div>
		              <!-- /.modal-content -->
		            </div>
		            <!-- /.modal-dialog. -->
		        </div>

	            <div class="card-body"> 
	              <table class="table table-secondary table-bordered table-striped text-center">
	                <thead>
	                  <tr>
	                    <th>Id</th>
	                    <th>Subcribers</th>
	                    <th>Status</th>
	                    <th>Actions</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  <tr v-for="(result, index) in subscribers" :key="result.id">
	                    <td>{{ result.id }}</td>
	                    <td>{{ result.subscriber }}</td>
	                    <td>
	                      <span v-if="result.status == true" class="alert-success p-1" style="color: black;">Active</span>
	                                            
	                      <span v-else class="alert-danger p-1" style="color: black;">Un-Active</span>
	                    </td>
	                    <td>
	                      <a v-if="result.status == true" href="#"><button @click="unactive(result.id)" type="button" class="btn btn-secondary"><i class="fas fa-times-circle"></i></button></a>

	                      <a v-else href="#"><button @click="active(result.id)" type="button" class="btn btn-success"><i class="fas fa-check-circle"></i></button></a>

	                      <a href="#"><button @click="destroy(result)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
	                    </td>
	                  </tr>
	                  
	                  </tbody>
	                  <tfoot>
	                  <tr>
	                    <th>Id</th>
	                    <th>Subcribers</th>
	                    <th>Status</th>
	                    <th>Actions</th>
	                  </tr>
	                  </tfoot>
	                </table>
	              </div>
	              <!-- /.card-body -->
	              <Pagination 
	                :pagination="pagination"
	                :offset="5"
	                @paginate="query === '' ? getData() : searchData()"
	                />
	            </div>
	            <!-- /.card -->
	          </div>
	          <!-- /.col -->
	        </div>
	        <!-- /.row -->
	      </div>
	      <!-- /.container-fluid -->
	    </section>
	    <!-- /.content -->
    </div>
</template>
<script>
	import Pagination from '../partial/Pagination';
    export default {
        name: 'Subscriber',

        components: {
	        Pagination,
	    },

	    data() {
    		return {
    		subscribers: {},
          	query: '',
          	queryField: 'id',

          	pagination:{
              	current_page: 1
          	},

			// Create a new form instance
			form: new Form({
					id: '',
					subscriber: '',
					status: '',
				})
	        }
    	},

    	created() {
        	this.getData();  
      	},

      	watch: {
            query:function(newQ, old){
                if(newQ === ''){
                    this.getData();
                }
                else{
                    this.searchData()
                }
            }
        },

        methods: {

			getData(){
				axios.get('/api/subscriber?page='+this.pagination.current_page)
				.then(response => {
					this.subscribers=response.data.data;
					this.pagination=response.data.meta;
					console.log('Success.')
				})
				.catch(e => {
					console.log('error..');
				})
			},

	        searchData(){
	              axios.get('/api/search/subscriber/'+this.queryField+'/'+this.query+'?page='+this.pagination.current_page)

	                .then(response => {
	                    this.subscribers=response.data.data;
	                    this.pagination=response.data.meta;
	              })

	              .catch(e => {
	                    console.log(e)
	             })
	        },

	        active(id) {
	          axios.get('/api/subscriber/active/'+id)

	          .then(response => {
	              this.getData();
	              toastr.success('Successfully subscriber activated.', 'Success')
	            })

	            .catch(e => {
	              toastr.error('Something is wrong...!', 'Prepare to die!')
	            })
	        },

	        unactive(id) {
	          axios.get('/api/subscriber/unactive/'+id)

	          .then(response => {
	              this.getData();
	              toastr.success('Successfully subscriber un-activated.', 'Success')
	            })

	            .catch(e => {
	              toastr.error('Something is wrong...!', 'Prepare to die!')
	            })
	        },

	        destroy(result) {
				this.form.reset();
				this.form.clear();
				this.form.fill(result);
				$('#deleteModal').modal('show');
				$('#deleteModalLabel').text('Delete Subscriber Info..');
	        },

	        destoryInfo() {
	          	this.form.delete('/api/subscriber/'+this.form.id)
	          	.then(response => {
		            this.getData();
		            $('#deleteModal').modal('hide');
		            if(this.form.successful){
		              	toastr.success('Successfully subscriber deleted.', 'Success')
		            }
	          })
	          .catch(e => {
	            	toastr.error('Something is wrong...!', 'Prepare to die!')
	          })
	        }
	    }
    }
</script>
